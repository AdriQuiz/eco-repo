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

    public function inversor() {
        return $this->belongsTo(Inversor::class, 'inversor_id');
    }

    public function proyecto() {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function getMonto() {
        return $this->monto;
    }

    public function getFechaCreado($valor) {
        return date('d/m/Y', strtotime($valor));
    }
}
