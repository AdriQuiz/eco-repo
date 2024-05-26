<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metrica extends Model
{
    use HasFactory;

    protected $table = 'metricas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'proyecto_id',
        'costo_total',
        'beneficios_netos',
        'crea_empleos',
        'acceso_servicios',
        'emision_gases',
        'consumo_recursos',
        'tecno_disponible',
        'gestion_riesgos'
    ];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
