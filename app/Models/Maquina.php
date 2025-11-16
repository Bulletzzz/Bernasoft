<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $table = 'maquinas';
    protected $fillable = ['title', 'category', 'cost', 'fab', 'decription', 'model', 'status'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}