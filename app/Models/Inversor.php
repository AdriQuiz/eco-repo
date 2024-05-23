<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversor extends Model
{
    use HasFactory;

    protected $table = 'inversores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'correo'
    ];
}
