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
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sepeda')->unique();
            $table->string('merk');
            $table->string('type')->nullable(); // 🔧 ADD: type sepeda
            $table->text('description')->nullable(); // 🔧 ADD: deskripsi
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available'); // 🔧 ADD: maintenance
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};
