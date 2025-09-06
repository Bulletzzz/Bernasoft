<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premio';
    protected $fillable = ['nome','foto_url','custo_unitario','status_premio'];

    public function maquinas() {
        return $this->hasMany(Maquina::class, 'id_premio');
    }
}
