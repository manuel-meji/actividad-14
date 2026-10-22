<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleIngrediente extends Model
{
  protected $fillable = [
        'unidadMedida',
        'cantidadRequerida',
        'receta_id',
        'ingrediente_id',
    ];

    // 2. Pertenece a una Receta
    public function receta(): BelongsTo
    {
        return $this->belongsTo(Receta::class);
    }

    // 3. Pertenece a un Ingrediente
    public function ingrediente(): BelongsTo
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
