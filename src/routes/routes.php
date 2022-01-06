<?php

use Illuminate\Support\Facades\Route;
use Vgplay\RewardStore\Actions\ListShopProduct;

Route::get('/shop/{shop:slug}/products', [ListShopProduct::class, 'list']);
