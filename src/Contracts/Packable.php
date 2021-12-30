<?php

namespace Vgplay\RewardStore\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface Packable
{
    public function packs(): MorphToMany;
}
