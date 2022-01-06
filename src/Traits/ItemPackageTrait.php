<?php

namespace Vgplay\RewardStore\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Vgplay\RewardStore\Models\IngameItem;

trait ItemPackageTrait
{
    public function items(): MorphToMany
    {
        return $this->morphToMany(IngameItem::class, 'packable', 'packables');
    }
}
