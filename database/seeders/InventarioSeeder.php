<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('inventario')->insert([
            ['quantidade' => 10, 'data_inv' => now(), 'id_modelo' => 1],
            ['quantidade' => 8, 'data_inv' => now(), 'id_modelo' => 2],
        ]);
    }
}
