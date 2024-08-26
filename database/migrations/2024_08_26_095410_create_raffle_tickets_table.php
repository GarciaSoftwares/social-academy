<?php

use App\Enums\Statuses\RaffleTicketStatusEnum;
use App\Models\Raffle;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raffle_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Raffle::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Transaction::class)->constrained()->nullable();

            $table->string('number');
            $table->enum('status', RaffleTicketStatusEnum::values())->default(RaffleTicketStatusEnum::PENDING->value);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['raffle_id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_tickets');
    }
};
