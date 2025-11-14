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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->tinyInteger('breakfast')->default(0);
            $table->tinyInteger('lunch')->default(0);
            $table->tinyInteger('dinner')->default(0);
            $table->tinyInteger('guest')->default(0);
            $table->decimal('total', 8, 2)->nullable();  // Computed total
            $table->timestamps();
            $table->unique(['user_id', 'date']); // One entry per user per day
            $table->index(['user_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
