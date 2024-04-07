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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->float('precio')->nullable(); 
            $table->string('estado'); 
            $table->date('fecha_inicio')->nullable(); 
            $table->date('fecha_fin')->nullable(); 
            $table->timestamps();
        });

        if (Tramite::count() === 0) {
            $tramites = [
                ['nombre' => 'Acta de Nacimiento', 'descripcion' => 'Documento que certifica el nacimiento de una persona.', 'precio' => 100.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'CURP', 'descripcion' => 'Clave Única de Registro de Población.', 'precio' => 50.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'Acta de Matrimonio', 'descripcion' => 'Certificado legal que prueba un matrimonio.', 'precio' => 200.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'Acta de Defunción', 'descripcion' => 'Documento que certifica la muerte de una persona.', 'precio' => 150.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'Trámite de Licencia de Conducir', 'descripcion' => 'Documento que otorga el permiso para conducir vehículos.', 'precio' => 120.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'Trámite de Registro de Vehículo', 'descripcion' => 'Proceso para inscribir un vehículo en el registro oficial.', 'precio' => 180.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
                ['nombre' => 'Trámite de Permiso de Construcción', 'descripcion' => 'Autorización para llevar a cabo construcciones o modificaciones en una propiedad.', 'precio' => 250.00, 'estado' => 'Activo', 'fecha_inicio' => now(), 'fecha_fin' => now()->addMonths(1)],
            ];
            foreach ($tramites as $tramiteData) {
                Tramite::create($tramiteData);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
