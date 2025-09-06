<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $fillable = ['quantidade','data_inv','id_modelo'];

    public function modelo() {
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }
}
