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
        Schema::create('reservas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_reserva', true)->primary();
            $table->unsignedBigInteger('id_pista');
            $table->unsignedBigInteger('id_socio');
            $table->date('fecha_reserva')->nullable();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado')->nullable();
            $table->string('jugador2_nombre')->nullable();
            $table->integer('jugador2_edad')->nullable();
            $table->decimal('jugador2_nivel', total: 2, places: 1);
            $table->string('jugador3_nombre')->nullable();
            $table->integer('jugador3_edad')->nullable();
            $table->decimal('jugador3_nivel', total: 2, places: 1);
            $table->string('jugador4_nombre')->nullable();
            $table->integer('jugador4_edad')->nullable();
            $table->decimal('jugador4_nivel', total: 2, places: 1);
            $table->datetime('fecha_alta', precision:0);
            $table->datetime('fecha_confirmacion', precision:0);


            $table->foreign('id_pista')->references('id_pista')->on('pistas');
            $table->foreign('id_socio')->references('id_socio')->on('socios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
