<?php

namespace Vgplay\RewardStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vgplay\RewardStore\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'picture' => $this->faker->imageUrl()
        ];
    }
}
