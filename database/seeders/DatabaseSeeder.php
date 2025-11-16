<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PontoSeeder::class,
            PremioSeeder::class,
            CategoriaSeeder::class,
            ModeloSeeder::class,
            InventarioSeeder::class,
            MaquinaSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}
