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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string("categoria_nombre");
            $table->string("categoria_descripcion")->nullable();
            $table->unsignedBigInteger("fkid_cuestionario");
            $table->timestamps();

            $table->foreign('fkid_cuestionario')->references('id')->on('cuestionarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
