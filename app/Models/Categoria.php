<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'title',
        'status',
        'visivel',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'visivel' => 'boolean',
        ];
    }
}