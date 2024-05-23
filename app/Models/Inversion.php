<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    use HasFactory;

    protected $table = 'inversiones';
    protected $primarykey = 'id';
    protected $fillable = [
        'inversor_id',
        'proyecto_id',
        'monto',
        'fecha_creado'
    ];
}
