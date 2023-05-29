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
        Schema::create('ganancias', function (Blueprint $table) {
            $table->id();
            $table->string('comprador')->max(255);
            $table->decimal('precio_tonelada');
            $table->decimal('cantidad');
            $table->date('fecha');
            $table->unsignedBigInteger('finca_id');
            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->unsignedBigInteger('temporada_id');
            $table->foreign('temporada_id')->references('id')->on('temporadas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganancias');
    }
};
