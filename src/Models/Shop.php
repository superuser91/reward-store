<?php

namespace Vgplay\RewardStore\Models;

use Vgplay\RewardStore\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
