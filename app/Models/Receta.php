<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Receta extends Model
{
   protected $fillable = [
        'titulo',
        'numeroPorciones',
        'instrucciones',
    ];

    // 2. Rol "ingredientes" 
    public function ingredientes(): BelongsToMany
    {
        return $this->belongsToMany(Ingrediente::class, 'detalle_ingredientes')
                    ->withPivot('unidadMedida', 'cantidadRequerida')
                    ->withTimestamps();
    }    public function getIngredientes(): array { return $this->ingredientes; }//
}
