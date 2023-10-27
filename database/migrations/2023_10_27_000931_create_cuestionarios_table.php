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
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id();
            $table->string("cuestionario_nombre");
            $table->string("cuestionario_autor");
            $table->char("cuestionario_tipo", 2);
            $table->char("cuestionario_estado", 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuestionarios');
    }
};
