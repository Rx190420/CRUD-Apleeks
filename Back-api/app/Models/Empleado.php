<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'telefono',
        'puesto',
        'empresa'
    ];
}

