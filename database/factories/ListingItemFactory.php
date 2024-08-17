<?php

namespace Database\Factories;

use App\Models\ListingItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingItem>
 */
class ListingItemFactory extends Factory
{
    protected $model = ListingItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => $this->faker->word(),
            'value' => $this->faker->sentence(),
        ];
    }
}
