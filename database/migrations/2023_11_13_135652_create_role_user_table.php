<?php

use Illuminate\Database\Migrations\Migration; // Importa la clase Migration para las migraciones
use Illuminate\Database\Schema\Blueprint; // Importa la clase Blueprint para la creación de tablas
use Illuminate\Support\Facades\Schema; // Importa la fachada Schema para interactuar con el esquema de la base de datos

class CreateRoleUserTable extends Migration // Declara la clase de migración CreateRoleUserTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Método para ejecutar las migraciones
    {
        // Crea la tabla intermedia 'role_user' para la relación muchos a muchos entre usuarios y roles
        Schema::create('role_user', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' autoincremental para la tabla intermedia
            $table->foreignId('user_id')->constrained(); // Crea una columna 'user_id' como clave foránea que referencia la columna 'id' de la tabla 'users'
            $table->foreignId('role_id')->constrained(); // Crea una columna 'role_id' como clave foránea que referencia la columna 'id' de la tabla 'roles'
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
        // Elimina la tabla 'role_user' si existe
        Schema::dropIfExists('role_user');
    }
}
