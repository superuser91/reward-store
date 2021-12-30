<?php

namespace Vgplay\RewardStore\Traits;

trait BuyerTrait
{
    public function getId()
    {
        return $this->id;
    }

    public function pay($amount, $unit)
    {
        # code...
    }
}
