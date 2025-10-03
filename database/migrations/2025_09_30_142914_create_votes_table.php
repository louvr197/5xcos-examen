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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           // ✅ Fix: Use foreignId() to create the column and constraint simultaneously.
            $table->foreignId('meme_id')
                  ->constrained() // Assumes table 'memes' and column 'id'
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained() // Assumes table 'users' and column 'id'
                  ->onDelete('cascade');

            // Optional but recommended: Add a unique constraint to prevent double-voting
            $table->unique(['user_id', 'meme_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
