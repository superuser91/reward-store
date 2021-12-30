<?php

namespace Vgplay\RewardStore\Contracts;

interface Deliverable
{
    public function deliver(Buyer $buyer, array $data);
}
