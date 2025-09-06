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
        Schema::create('modelo', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('fabricante', 50);
            $table->string('foto_url', 100);
            $table->string('descricao', 100)->nullable();
            $table->string('status_modelo', 30);
            $table->foreignId('id_categoria')
                  ->nullable()
                  ->constrained('categoria')
                  ->onDelete('set null');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelo');
    }
};
