<?php

namespace Vgplay\RewardStore\Models;

use Vgplay\RewardStore\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftcodeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'giftcode_id',
        'code',
        'user_id',
        'claim_at',
        'is_shared'
    ];

    protected $casts = [
        'claimed_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Giftcode::class);
    }
}
