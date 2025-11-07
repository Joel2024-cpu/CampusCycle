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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bicycle_id')->constrained('bicycles')->onDelete('cascade');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('return_time')->nullable();
            $table->integer('total_cost');
            $table->integer('denda')->default(0);
            $table->enum('status', ['ongoing', 'returned'])->default('ongoing');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
