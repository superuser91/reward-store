<?php

namespace Vgplay\RewardStore\Contracts;

interface Buyer
{
    public function getId();
    public function pay($amount, $unit);
}
