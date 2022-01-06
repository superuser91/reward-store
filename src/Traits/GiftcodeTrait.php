<?php

namespace Vgplay\RewardStore\Traits;

use Vgplay\RewardStore\Contracts\Buyer;
use Vgplay\RewardStore\Models\GiftcodeRecord;

trait GiftcodeTrait
{
    public function lookup(): GiftcodeRecord
    {
        return GiftcodeRecord::where('giftcode_id', $this->id)
            ->where(function ($giftcode) {
                $giftcode->whereNull('user_id')
                    ->orWhere('is_shared', true);
            })->first();
    }

    public function deliver(Buyer $buyer, array $data)
    {
        # code...
    }
}
