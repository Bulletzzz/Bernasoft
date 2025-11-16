<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuario')->insert([
            ['nome' => 'Administrador', 'email' => 'admin@teste.com', 'cpf' => '12345678901', 'senha' => Hash::make('123456')],
            ['nome' => 'Usuario Teste', 'email' => 'user@teste.com', 'cpf' => '10987654321', 'senha' => Hash::make('123456')],
        ]);
    }
}
