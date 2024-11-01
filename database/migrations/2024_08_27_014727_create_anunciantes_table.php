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
        Schema::create('anunciantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('contenido');
            $table->binary('image');
            $table->string('addedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anunciantes');
    }
};
