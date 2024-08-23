<?php

use App\Enums\Statuses\RaffleCategoryStatusEnum;
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
        Schema::create('raffle_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enterprise::class)->constrained();
            $table->foreignIdFor(RaffleCategory::class, 'dad_id')->nullable();
            $table->foreignIdFor(RaffleCategory::class, 'son_id')->nullable();

            $table->string('name');
            $table->string('slug');
            $table->enum('status', RaffleCategoryStatusEnum::values())->default('active');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dad_id')->references('id')->on('raffle_categories');
            $table->foreign('son_id')->references('id')->on('raffle_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_categories');
    }
};
