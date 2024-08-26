<?php

namespace Database\Factories;

use App\Enums\Statuses\RaffleTicketStatusEnum;
use App\Models\Raffle;
use App\Models\RaffleTicket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RaffleTicket>
 */
class RaffleTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'raffle_id'      => Raffle::factory(),
            'user_id'        => User::factory(),
            'transaction_id' => Transaction::factory(),
            'number'         => $this->faker->randomNumber(),
            'status'         => $this->faker->randomElement(RaffleTicketStatusEnum::values()),
        ];
    }
}
