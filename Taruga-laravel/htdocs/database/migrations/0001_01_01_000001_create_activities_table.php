<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 55);
            $table->decimal('numeroAtividade', 5);
            $table->string('nomeMateria', 15);
            $table->foreignId('fk_modulos_id')->constrained('modules');
            $table->timestamps();
        });        
    }
};

