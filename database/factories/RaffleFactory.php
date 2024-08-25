<?php

namespace Database\Factories;

use App\Enums\RaffleDisplayTicketsEnum;
use App\Enums\RaffleTicketQuantityEnum;
use App\Enums\Statuses\RaffleStatusEnum;
use App\Models\Enterprise;
use App\Models\Raffle;
use App\Models\RaffleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Raffle>
 */
class RaffleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enterprise_id'      => Enterprise::factory(),
            'raffle_category_id' => RaffleCategory::factory(),
            'name'               => fake()->name(),
            'description'        => fake()->text(),
            'ticket_price'       => fake()->numerify("##.##"),
            'status'             => fake()->randomElement(RaffleStatusEnum::cases()),
            'display_tickets'    => fake()->randomElement(RaffleDisplayTicketsEnum::cases()),
        ];
    }
}
