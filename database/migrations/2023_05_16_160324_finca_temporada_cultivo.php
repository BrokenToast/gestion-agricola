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
        Schema::create('finca_temporada_cultivo', function (Blueprint $table) {
            $table->unsignedBigInteger('cultivo_id');
            $table->foreign('cultivo_id')->on('cultivos')->references('id');
            $table->unsignedBigInteger('finca_id')->null;
            $table->foreign('finca_id')->on('fincas')->references('id');
            $table->unsignedBigInteger('temporada_id');
            $table->foreign('temporada_id')->on('temporadas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finca_temporada_cultivo');
    }
};
