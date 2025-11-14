<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_rates', function (Blueprint $table) {
            $table->id();
            $table->string('meal_type', 50);
            $table->decimal('rate', 10, 2);
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->timestamps();
            //$table->unique(['meal_type', 'effective_from']); // One active rate per type per period
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_rates');
    }
};
