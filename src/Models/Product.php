<?php

namespace Vgplay\RewardStore\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Vgplay\RewardStore\Contracts\Buyer;
use Vgplay\RewardStore\Contracts\Deliverable;
use Vgplay\RewardStore\Contracts\Product as ProductContract;

class Product extends Model implements ProductContract
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'store_id',
        'name',
        'picture',
        'purchaseable_type',
        'purchaseable_id',
        'accepted_payments',
        'stats',
        'limit',
        'stock',
        'available_from',
        'available_to',
        'is_personal',
        'is_publish',
        'min_vxu',
    ];

    protected $casts = [
        'accepted_payments' => 'array'
    ];

    public function purchaseable()
    {
        return $this->morphTo();
    }

    public function purchase(Buyer $buyer, array $data)
    {
        DB::transaction(function () use ($buyer, $data) {
            $buyer->pay($this->accepted_payments[$data['payment_method']], $data['payment_method']);

            if ($this->purchaseable instanceof Deliverable) {
                $this->purchaseable->deliver($buyer, $data);
            }

            Transaction::create([
                'user_id' => $buyer->getId(),
                'product_id' => $this->id,
                'amount' => $this->accepted_payments[$data['payment_method']],
                'payment_unit' => $data['payment_method'],
            ]);
        });
    }
}
