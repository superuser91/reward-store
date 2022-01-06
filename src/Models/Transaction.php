<?php

namespace Vgplay\RewardStore\Models;

use Vgplay\RewardStore\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'status',
        'note',
        'amount',
        'payment_unit',
    ];
}
