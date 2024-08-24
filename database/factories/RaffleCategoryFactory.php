<?php

namespace Database\Factories;

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
            'enterprise_id' => Enterprise::factory(),
            'name' => fake()->name(),
            'slug' => Str::slug($name)
        ];
    }

    /**
     * Define state with dad category.
     *
     * @return $this
     */
    public function withDad(): static
    {
        return $this->state(fn (array $attributes) => [
            'dad_id' => RaffleCategory::factory(),
        ]);
    }

    /**
     * Define state with son category.
     *
     * @return $this
     */
    public function withSon(): static
    {
        return $this->state(fn (array $attributes) => [
            'son_id' => RaffleCategory::factory(),
        ]);
    }

    /**
     * Define state with das and son category.
     *
     * @return $this
     */
    public function withFamily(): static
    {
        $dad = RaffleCategory::factory()->create();

        return $this->state(fn (array $attributes) => [
            'dad_id' => $dad->id,
            'son_id' => RaffleCategory::factory()->create(['dad_id' => $dad->id]),
        ]);
    }
}
