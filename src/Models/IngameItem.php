<?php

namespace Vgplay\RewardStore\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;
use Vgplay\RewardStore\Contracts\Purchaseable;
use Vgplay\RewardStore\Traits\PurchaseableTrait;

class IngameItem extends Model implements Cacheable, Purchaseable
{
    use HasFactory;
    use SoftDeletes;
    use HasCache;
    use PurchaseableTrait;

    protected $fillable = [
        'name',
        'picture',
        'stats',
    ];

    protected $casts = [
        'stats' => 'array',
    ];
}
