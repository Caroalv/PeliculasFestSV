<?php

use Illuminate\Database\Migrations\Migration; // Importa la clase Migration para las migraciones
use Illuminate\Database\Schema\Blueprint; // Importa la clase Blueprint para la creación de tablas
use Illuminate\Support\Facades\Schema; // Importa la fachada Schema para interactuar con el esquema de la base de datos

class CreateRolesTable extends Migration // Declara la clase de migración CreateRolesTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Método para ejecutar las migraciones
    {
        // Crea la tabla 'roles'
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' autoincremental, comúnmente utilizada como clave primaria
            $table->string('name')->unique(); // Crea una columna 'name' para almacenar el nombre del rol y se especifica como única para evitar duplicados
            $table->timestamps(); // Crea dos columnas, 'created_at' y 'updated_at', para mantener automáticamente las marcas de tiempo de creación y actualización de los registros
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // Método para revertir las migraciones
    {
        // Elimina la tabla 'roles' si existe
        Schema::dropIfExists('roles');
    }
}
