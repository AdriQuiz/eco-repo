<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Usuario
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario_id',
        'nit',
        'titulo',
        'telefono',
        'direccion'
    ];

    public function proyectos() {
        return $this->hasMany(Proyecto::class, 'empresa_id');
    }

    public function getTituloEmpresa() {
        return "{$this->titulo}";
    }

    public function setTituloEmpresa($titulo) {
        $this->attributes['titulo'] = ucfirst($titulo);
    }

    public function scopeActivas($query) {
        return $query->where('activo', 1);
    }
}
