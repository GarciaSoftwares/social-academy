<?php

use App\Enums\Statuses\RaffleCategoryStatusEnum;
use App\Models\Enterprise;
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

            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('status', RaffleCategoryStatusEnum::values())->default('active');

            $table->timestamps();
            $table->softDeletes();
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
