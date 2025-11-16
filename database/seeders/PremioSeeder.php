<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('premio')->insert([
            ['nome' => 'Ursinho', 'foto_url' => 'generica.jpg', 'custo_unitario' => 50, 'status_premio' => 'ativo'],
            ['nome' => 'Cachorro', 'foto_url' => 'generica.jpg', 'custo_unitario' => 60, 'status_premio' => 'ativo'],
            ['nome' => 'Gato', 'foto_url' => 'generica.jpg', 'custo_unitario' => 55, 'status_premio' => 'ativo'],
            ['nome' => 'Elefante', 'foto_url' => 'generica.jpg', 'custo_unitario' => 70, 'status_premio' => 'ativo'],
        ]);
    }
}
