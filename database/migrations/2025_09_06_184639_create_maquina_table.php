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
        Schema::create('maquina', function (Blueprint $table) {
            $table->id();
            $table->string('nome_esp', 50);
            $table->date('data_instalacao');
            $table->string('status_maquina', 30);
            $table->foreignId('id_modelo')
                  ->nullable()
                  ->constrained('modelo')
                  ->onDelete('set null');
            $table->foreignId('id_localizacao')
                  ->nullable()
                  ->constrained('ponto')
                  ->onDelete('set null');
            $table->foreignId('id_premio')
                  ->nullable()
                  ->constrained('premio')
                  ->onDelete('set null');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquina');
    }
};
