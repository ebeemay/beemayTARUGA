<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 55);
            $table->decimal('rp', 25);
            $table->string('senha', 255);
            $table->string('precisa_atualizar_senha')->default(true);
            $table->string('email', 55);
            $table->foreignId('fk_instituicao_id')->constrained('institutions');
            $table->timestamps();
        });
        
    }
};

