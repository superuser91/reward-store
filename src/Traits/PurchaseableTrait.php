<?php

namespace Vgplay\RewardStore\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Vgplay\RewardStore\Models\IngameItem;
use Vgplay\RewardStore\Models\Product;

trait PurchaseableTrait
{
    public function purchaseables(): MorphMany
    {
        return $this->morphMany(Product::class, 'purchaseable');
    }
}
