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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50)->nullable();
            $table->string('cedula', 15)->unique();
            $table->string('rif', 15)->nullable();
            $table->date('fecha');
            $table->string('telefono', 30)->nullable();
            $table->string('celular', 30);
            $table->string('email')->unique();
            $table->string('lugarnac');
            $table->string('nacionalidad');
            $table->text('sexo');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('personas_id')->nullable();
            $table->unsignedBigInteger('user_create')->nullable();
            $table->unsignedBigInteger('parentesco_id');
            $table->string('vocero_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_create')->references('id')->on('users');
            //$table->foreign('parentesco_id')->references('id')->on('parentescos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
