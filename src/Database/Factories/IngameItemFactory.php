<?php

namespace Vgplay\RewardStore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vgplay\RewardStore\Models\IngameItem;

class IngameItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngameItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
