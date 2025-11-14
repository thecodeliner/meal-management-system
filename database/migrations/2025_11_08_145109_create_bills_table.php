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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('month'); // e.g., '2025-11'
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
            $table->date('generated_at')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'month']);
            $table->index(['user_id', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
