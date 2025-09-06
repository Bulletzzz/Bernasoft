<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $fillable = ['nome','fabricante','foto_url','descricao','status_modelo','id_categoria'];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function inventarios() {
        return $this->hasMany(Inventario::class, 'id_modelo');
    }

    public function maquinas() {
        return $this->hasMany(Maquina::class, 'id_modelo');
    }
}
