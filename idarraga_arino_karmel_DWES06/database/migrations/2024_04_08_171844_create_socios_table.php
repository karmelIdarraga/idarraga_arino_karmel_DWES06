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
        Schema::create('socios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_socio', true)->primary();
            $table->string('nombre')->nullable();
            $table->integer('edad')->nullable();
            $table->decimal('nivel', total: 2, places: 1);
            $table->integer('antiguedad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
