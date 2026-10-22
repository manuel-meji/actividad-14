    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('detalle_ingredientes', function (Blueprint $table) {
                $table->id();
                $table->string('unidadMedida');
                $table->float('cantidadRequerida');
                $table->foreignId('receta_id')->constrained()->onDelete('cascade');
                $table->foreignId('ingrediente_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('detalle_ingredientes');
        }
    };
