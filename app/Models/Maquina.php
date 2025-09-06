<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $table = 'maquina';
    protected $fillable = ['nome_esp','data_instalacao','status_maquina','id_modelo','id_localizacao','id_premio'];

    public function modelo() {
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }

    public function ponto() {
        return $this->belongsTo(Ponto::class, 'id_localizacao');
    }

    public function premio() {
        return $this->belongsTo(Premio::class, 'id_premio');
    }
}
