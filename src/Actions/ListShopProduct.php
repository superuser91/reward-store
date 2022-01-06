<?php

namespace Vgplay\RewardStore\Actions;

use Illuminate\Http\Request;
use Vgplay\RewardStore\Models\Product;
use Vgplay\RewardStore\Models\Shop;

class ListShopProduct
{
    public function list(Request $request, Shop $shop)
    {
        return $shop->products;
    }
}
