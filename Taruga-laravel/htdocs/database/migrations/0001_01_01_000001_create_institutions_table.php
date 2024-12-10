<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 55);
            $table->decimal('cnpj', 20);
            $table->string('endereco', 100);
            $table->decimal('telefone', 20);
            $table->string('email', 55);
            $table->string('senha', 255);
            $table->timestamps();
        });
        
    }
};

