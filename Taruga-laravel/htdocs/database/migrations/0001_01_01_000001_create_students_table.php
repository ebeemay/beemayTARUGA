<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 55);
            $table->decimal('ra', 25);
            $table->string('senha', 255);
            $table->string('email', 55);
            $table->string('situacao', 15);
            $table->string('foto', 255);
            $table->foreignId('fk_professores_id')->constrained('teachers');
            $table->foreignId('fk_turmas_id')->constrained('classes');
            $table->timestamps();
        });
        
    }
};