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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personas_id');
            $table->unsignedBigInteger('estados_id');
            $table->unsignedBigInteger('municipios_id');
            $table->unsignedBigInteger('parroquias_id');
            $table->unsignedBigInteger('ciudades_id');
            $table->string('urbanizacion');
            $table->unsignedBigInteger('zonas_id');
            $table->string('name_zona');
            $table->unsignedBigInteger('areas_id');
            $table->string('name_area');
            $table->unsignedBigInteger('hogares_id');
            $table->string('name_hogar');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
