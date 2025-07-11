<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();                              // ID único (1, 2, 3...)
            $table->string('title');                   // Título de la nota
            $table->text('content');                   // Contenido largo
            $table->string('category')->nullable();    // Categoría (opcional)
            $table->boolean('is_favorite')->default(false); // ¿Es favorita?
            $table->timestamps();                      // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}