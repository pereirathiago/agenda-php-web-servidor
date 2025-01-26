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
        Schema::create('convites', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status_convite');
            $table->foreignId('id_usuario_convidado')->references('id')->on('usuarios');
            $table->foreignId('id_compromisso')->references('id')->on('compromissos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convites');
    }
};
