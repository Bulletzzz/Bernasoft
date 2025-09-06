<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $table = 'ponto';
    protected $fillable = ['nome','endereco','contato'];

    public function maquinas() {
        return $this->hasMany(Maquina::class, 'id_localizacao');
    }
}
