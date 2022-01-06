<?php

namespace Vgplay\RewardStore\Models;

use Vgplay\RewardStore\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;
use Vgplay\RewardStore\Contracts\Packable;
use Vgplay\RewardStore\Traits\ItemPackageTrait;

class Pack  extends Model implements Cacheable, Packable
{
    use HasFactory;
    use HasCache;
    use SoftDeletes;
    use ItemPackageTrait;

    protected $fillable = [
        'name',
    ];
}
