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
        Schema::create('meal_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
    
            $table->date('date');
    
            $table->unsignedInteger('breakfast')->default(0);
            $table->unsignedInteger('lunch')->default(0);
            $table->unsignedInteger('dinner')->default(0);
            $table->unsignedInteger('guest')->default(0);
    
            $table->decimal('total', 8, 2)->default(0); // Example: 999,999.99
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_records');
    }
};
