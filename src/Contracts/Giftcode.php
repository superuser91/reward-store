<?php

namespace Vgplay\RewardStore\Contracts;

use Vgplay\RewardStore\Models\GiftcodeRecord;

interface Giftcode extends Packable, Deliverable
{
    public function lookup(): GiftcodeRecord;
}
