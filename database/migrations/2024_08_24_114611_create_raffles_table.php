<?php

use App\Enums\RaffleDisplayTicketsEnum;
use App\Enums\RaffleTotalTicketEnum;
use App\Enums\Statuses\RaffleStatusEnum;
use App\Models\Enterprise;
use App\Models\RaffleCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enterprise::class)->constrained();
            $table->foreignIdFor(RaffleCategory::class)->constrained();

            $table->string('name');
            $table->text('description');
            $table->decimal('ticket_price');
            $table->string('starting_number')->default("001");
            $table->integer('ticket_quantity')->default(RaffleTotalTicketEnum::_200_);
            $table->enum('status', RaffleStatusEnum::values())->default(RaffleStatusEnum::PENDING);
            $table->enum('display_tickets', RaffleDisplayTicketsEnum::values())->default(RaffleDisplayTicketsEnum::LIST);
            $table->boolean('display_ranking')->default(false);
            $table->json('theme')->nullable();
            $table->json('data')->nullable();

            $table->dateTime('release_at')->default(now());
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffles');
    }
};
