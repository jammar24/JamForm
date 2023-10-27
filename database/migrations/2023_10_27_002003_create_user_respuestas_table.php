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
        Schema::create('user_respuestas', function (Blueprint $table) {
            $table->id();
            $table->string("respuesta");
            $table->unsignedBigInteger("fkid_user");
            $table->unsignedBigInteger("fkid_opcion");
            $table->timestamps();
        });
    }
// en las migraciones determinamos todo lo que va en el contenido de las tablas 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_respuestas');
    }
};
