<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PontoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ponto')->insert([
            ['nome' => 'Shopping Central', 'endereco' => 'Rua 1, 100', 'contato' => '1111-1111'],
            ['nome' => 'Centro Comercial Norte', 'endereco' => 'Rua 2, 200', 'contato' => '2222-2222'],
            ['nome' => 'Praça das Crianças', 'endereco' => 'Avenida 3, 300', 'contato' => '3333-3333'],
        ]);
    }
}

