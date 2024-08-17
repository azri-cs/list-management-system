<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingItem;
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
            'created_by' => User::factory(),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
        ];
    }

    public function configure(): ListingFactory
    {
        return $this->afterCreating(function (Listing $listing) {
            $listing->tags()->attach(
                Tag::factory()->count(random_int(1, 5))->create()
            );

            $listing->items()->createMany(
                ListingItem::factory()->count(random_int(3, 10))->make()->toArray()
            );
        });
    }
}
