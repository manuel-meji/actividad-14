<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingrediente extends Model
{// 1. Atributo de la tabla 'ingredientes'
    protected $fillable = [
        'nombre',
    ];

    // 2. Rol "recetas" (0..*) de tu Diagrama de Clases
    public function recetas(): BelongsToMany
    {
        return $this->belongsToMany(Receta::class, 'detalle_ingredientes')
                    ->withPivot('unidadMedida', 'cantidadRequerida')
                    ->withTimestamps();
    }  
}
