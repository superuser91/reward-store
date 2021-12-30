<?php

namespace Vgplay\RewardStore\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;
use Vgplay\RewardStore\Contracts\ActualReward;

class Pack  extends Model implements Cacheable, ActualReward
{
    use HasFactory;
    use HasCache;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];
}
