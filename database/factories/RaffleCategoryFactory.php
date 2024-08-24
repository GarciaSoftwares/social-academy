<?php

namespace Database\Factories;

use App\Enums\Statuses\RaffleCategoryStatusEnum;
use App\Models\Enterprise;
use App\Models\RaffleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<RaffleCategory>
 */
class RaffleCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => fake()->name(),
            'slug' => Str::slug($name)
        ];
    }

    /**
     * Define state with das and son category.
     *
     * @return $this
     */
    public function inactive(): static
    {
        $dad = RaffleCategory::factory()->create();

        return $this->state(fn (array $attributes) => [
            'status' => RaffleCategoryStatusEnum::INACTIVE,
        ]);
    }
}
