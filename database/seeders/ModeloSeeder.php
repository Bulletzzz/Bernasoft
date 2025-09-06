<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('modelo')->insert([
            [
                'nome' => 'Máquina X',
                'fabricante' => 'Fabricante A',
                'foto_url' => 'generica.jpg',
                'descricao' => 'Máquina padrão de pelúcias',
                'status_modelo' => 'ativo',
                'id_categoria' => 1
            ],
            [
                'nome' => 'Máquina Y',
                'fabricante' => 'Fabricante B',
                'foto_url' => 'generica.jpg',
                'descricao' => 'Máquina padrão de brinquedos',
                'status_modelo' => 'ativo',
                'id_categoria' => 2
            ],
        ]);
    }
}
