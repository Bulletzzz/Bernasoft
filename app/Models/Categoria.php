<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['nome'];

    public function modelos() {
        return $this->hasMany(Modelo::class, 'id_categoria');
    }
}
