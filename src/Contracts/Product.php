<?php

namespace Vgplay\RewardStore\Contracts;

interface Product
{
    public function purchase(Buyer $buyer, array $data);
}
