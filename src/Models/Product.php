<?php

namespace Vgplay\RewardStore\Models;

use Vgplay\RewardStore\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Vgplay\RewardStore\Contracts\Buyer;
use Vgplay\RewardStore\Contracts\Deliverable;
use Vgplay\RewardStore\Contracts\Product as ProductContract;
use Vgplay\RewardStore\Exceptions\MissingPaymentMethodException;
use Vgplay\RewardStore\Exceptions\ViolateConditionException;

class Product extends Model implements ProductContract
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'shop_id',
        'name',
        'picture',
        'purchaseable_type',
        'purchaseable_id',
        'accepted_payments',
        'conditions',
        'stats',
        'limit',
        'stock',
        'available_from',
        'available_to',
        'is_personal',
        'is_publish',
    ];

    protected $casts = [
        'accepted_payments' => 'array',
        'conditions' => 'array',
    ];

    public function purchaseable()
    {
        return $this->morphTo();
    }

    public function purchase(Buyer $buyer, array $data)
    {
        if (!is_null($this->available_from) && now() < $this->available_from) {
            throw new \Exception('not start');
        }

        if (!is_null($this->available_to) && now() > $this->available_to) {
            throw new \Exception('end');
        }

        foreach (($this->conditions ?? []) as $condition) {
            $this->evaluate($buyer, $condition);
        }

        DB::transaction(function () use ($buyer, $data) {
            if ($this->accepted_payments) {
                if (!isset($data['payment_method'])) {
                    throw new MissingPaymentMethodException();
                }
                $buyer->pay($this->accepted_payments[$data['payment_method']], $data['payment_method']);
            }

            if ($this->purchaseable instanceof Deliverable) {
                $this->purchaseable->deliver($buyer, $data);
            }

            Transaction::create([
                'user_id' => $buyer->getId(),
                'product_id' => $this->id,
                'amount' => $this->accepted_payments ? $this->accepted_payments[$data['payment_method']] : 0,
                'payment_unit' => $data['payment_method'] ?? '',
            ]);
        });
    }

    protected function evaluate(Buyer $buyer, array $condition)
    {
        $attr = isset($buyer->conditionAttributes[$condition[0]]) ? $buyer->conditionAttributes[$condition[0]] : $condition[0];

        switch ($condition[1]) {
            case '=':
                if (!$buyer->{$condition[0]} == $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s phải bằng %s", $attr, $condition[2]));
                }
                break;
            case '>':
                if (!$buyer->{$condition[0]} > $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s phải lớn hơn %s", $attr, $condition[2]));
                }
                break;
            case '<':
                if (!$buyer->{$condition[0]} < $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s phải nhỏ hơn %s", $attr, $condition[2]));
                }
                break;
            case '<=':
                if (!$buyer->{$condition[0]} <= $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s chỉ được tối đa bằng %s", $attr, $condition[2]));
                }
                break;
            case '>=':
                if (!$buyer->{$condition[0]} >= $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s phải đạt tối thiểu %s", $attr, $condition[2]));
                }
                break;
            case '!=':
                if (!$buyer->{$condition[0]} != $condition[2]) {
                    throw new ViolateConditionException(sprintf("%s phải khác %s", $attr, $condition[2]));
                }
                break;
            default:
                return false;
        }
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
