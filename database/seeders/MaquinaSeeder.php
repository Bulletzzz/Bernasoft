<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('maquina')->insert([
            ['nome_esp' => 'Pelúcia Fun', 'data_instalacao' => now(), 'status_maquina' => 'ativa', 'id_modelo' => 1, 'id_localizacao' => 1, 'id_premio' => 1],
            ['nome_esp' => 'Brinquedo Mania', 'data_instalacao' => now(), 'status_maquina' => 'ativa', 'id_modelo' => 2, 'id_localizacao' => 2, 'id_premio' => 2],
        ]);
    }
}
