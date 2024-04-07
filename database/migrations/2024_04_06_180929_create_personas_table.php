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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); 
            $table->string('correo')->unique(); 
            $table->string('telefono')->nullable(); 
            $table->string('direccion')->nullable(); 
            $table->timestamps();
        });

        if (Persona::count() === 0) {
            $personas = [
                ['nombre' => 'Juan Pérez', 'correo' => 'juan@example.com', 'telefono' => '123456789', 'direccion' => 'Calle Principal 123'],
                ['nombre' => 'María García', 'correo' => 'maria@example.com', 'telefono' => '987654321', 'direccion' => 'Avenida Central 456'],
                ['nombre' => 'José Rodríguez', 'correo' => 'jose@example.com', 'telefono' => '555555555', 'direccion' => 'Avenida Reforma 789'],
                ['nombre' => 'Ana López', 'correo' => 'ana@example.com', 'telefono' => '666666666', 'direccion' => 'Calle Juárez 321'],
                ['nombre' => 'Pedro Martínez', 'correo' => 'pedro@example.com', 'telefono' => '777777777', 'direccion' => 'Avenida 5 de Mayo 456'],
                ['nombre' => 'Laura Sánchez', 'correo' => 'laura@example.com', 'telefono' => '888888888', 'direccion' => 'Calle Independencia 789'],
                ['nombre' => 'Carlos González', 'correo' => 'carlos@example.com', 'telefono' => '999999999', 'direccion' => 'Avenida Insurgentes 123'],
                ['nombre' => 'Sofía Torres', 'correo' => 'sofia@example.com', 'telefono' => '1010101010', 'direccion' => 'Calle Revolución 456'],
                ['nombre' => 'Miguel Ramírez', 'correo' => 'miguel@example.com', 'telefono' => '1111111111', 'direccion' => 'Avenida Hidalgo 789'],
                ['nombre' => 'Fernanda Díaz', 'correo' => 'fernanda@example.com', 'telefono' => '1212121212', 'direccion' => 'Calle Madero 123'],
            ];

            foreach ($personas as $personaData) {
                Persona::create($personaData);
            }
        }   

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
