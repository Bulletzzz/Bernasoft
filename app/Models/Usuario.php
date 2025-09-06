<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $fillable = ['nome','email','cpf','senha'];
    protected $hidden = ['senha'];
}
