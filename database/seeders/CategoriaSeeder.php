<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categoria')->insert([
            ['nome' => 'Pelúcias'],
            ['nome' => 'Brinquedos'],
        ]);
    }
}
