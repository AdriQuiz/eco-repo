<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversor extends Usuario
{
    use HasFactory;

    protected $table = 'inversores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario_id',
        'ci',
        'nombre',
        'apellido',
        'telefono'
    ];

    public function inversiones() {
        return $this->hasMany(Inversion::class, 'inversor_id');
    }

    // Para acceder al nombre
    public function getNombreCompleto() {
        return "{$this->nombre} {$this->apellido}";
    }

    public function setNombre($nombre) {
        $this->attributes['nombre'] = ucfirst($nombre);
    }

    public function setApellido($apellido) {
        $this->attributes['apellido'] = ucfirst($apellido);
    }

    // Scope para inversores activos
    public function scopeActivos($query) {
        return $query->where('activo', 1);
    }
}
