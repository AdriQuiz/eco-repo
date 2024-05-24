<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'empresa_id',
        'titulo',
        'tipo',
        'costo',
        'plazo_ejecucion',
        'es_viable'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function inversiones() {
        return $this->hasMany(Inversion::class, 'proyecto_id');
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getEstado() {
        return $this->es_viable ? 'Viable' : 'No viable';
    }
}
