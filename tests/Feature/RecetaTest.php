<?php

namespace Tests\Feature;

use App\Models\Receta;
use App\Models\Ingrediente;
use App\Models\DetalleIngrediente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecetaTest extends TestCase
{
    use RefreshDatabase; // Ejecuta las migraciones automáticamente al correr el test

    public function test_instanciar_receta_con_ingredientes(): void
    {
        // 1. Instanciar objetos de la clase Ingrediente
        $arroz = new Ingrediente([
            'nombre' => 'Arroz blanco',
        ]);
        $arroz->save();

        $frijoles = new Ingrediente([
            'nombre' => 'Frijoles negros',
        ]);
        $frijoles->save();

        // 2. Instanciar un objeto de la clase Receta
        $receta = new Receta([
            'titulo' => 'Gallo Pinto',
            'numeroPorciones' => 4,
            'instrucciones' => 'Sofreír olores, agregar los frijoles y mezclar con el arroz.',
        ]);
        $receta->save();

        // 3. Instanciar la clase de asociación DetalleIngrediente y relacionarla
        $detalle1 = new DetalleIngrediente([
            'unidadMedida' => 'tazas',
            'cantidadRequerida' => 3.0,
        ]);
        $detalle1->receta()->associate($receta);
        $detalle1->ingrediente()->associate($arroz);
        $detalle1->save();

        $detalle2 = new DetalleIngrediente([
            'unidadMedida' => 'tazas',
            'cantidadRequerida' => 2.5,
        ]);
        $detalle2->receta()->associate($receta);
        $detalle2->ingrediente()->associate($frijoles);
        $detalle2->save();

        // 4. Comprobar (Assert) que las instancias y la relación funcionan
        $this->assertCount(2, $receta->ingredientes);
        $this->assertEquals('Arroz blanco', $receta->ingredientes->first()->nombre);
        $this->assertEquals(3.0, $receta->ingredientes->first()->pivot->cantidadRequerida);
    }
}