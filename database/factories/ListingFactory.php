<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Listing;
use App\Models\ItemListing;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_by' => 2,
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
        ];
    }

    public function configure(): ListingFactory
    {
        return $this->afterCreating(function (Listing $listing) {
            $listing->tags()->attach(
                Tag::factory()->count(random_int(1, 5))->create(['created_by' => 2])
            );

            $listing->items()->attach(
                Item::factory()->count(random_int(1, 5))->create(['created_by' => 2])
            );
        });
    }
}
