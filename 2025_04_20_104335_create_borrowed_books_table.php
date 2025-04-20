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
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key for user
            $table->foreignId('book_id')->constrained()->onDelete('cascade');  // Foreign key for book
            $table->timestamp('borrowed_at')->useCurrent();  // Timestamp for when the book was borrowed
            $table->timestamp('returned_at')->nullable();  // Timestamp for when the book was returned
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
