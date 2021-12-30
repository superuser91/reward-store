<?php

use Illuminate\Support\Facades\Route;
use Vgplay\RewardStore\Actions\ListStoreProduct;

Route::get('/stores/{store}/products', [ListStoreProduct::class, 'list']);
