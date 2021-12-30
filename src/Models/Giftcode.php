<?php

namespace Vgplay\RewardStore\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;
use Vgplay\RewardStore\Contracts\Giftcode as GiftcodeContract;
use Vgplay\RewardStore\Contracts\Purchaseable;
use Vgplay\RewardStore\Traits\GiftcodeTrait;
use Vgplay\RewardStore\Traits\ItemPackageTrait;
use Vgplay\RewardStore\Traits\PurchaseableTrait;

class Giftcode extends Model implements Cacheable, GiftcodeContract, Purchaseable
{
    use HasFactory;
    use SoftDeletes;
    use HasCache;
    use GiftcodeTrait;
    use ItemPackageTrait;
    use PurchaseableTrait;

    protected $fillable = [
        'name',
        'stats'
    ];

    protected $casts = [
        'stats' => 'array',
    ];

    public function giftcodeRecords()
    {
        return $this->hasMany(GiftcodeRecord::class);
    }
}
