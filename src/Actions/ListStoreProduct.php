<?php

namespace Vgplay\RewardStore\Actions;

use Illuminate\Http\Request;
use Vgplay\RewardStore\Models\Product;

class ListStoreProduct
{
    public function list(Request $request, $id)
    {
        return Product::where('store_id', $id)->get();
    }
}
