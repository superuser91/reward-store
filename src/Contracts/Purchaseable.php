<?php

namespace Vgplay\RewardStore\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Purchaseable
{
    public function purchaseables(): MorphMany;
}
