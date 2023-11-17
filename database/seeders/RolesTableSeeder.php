<?php  

namespace Database\Seeders;  // Define el espacio de nombres para el seeder

use Illuminate\Database\Seeder;  // Importa la clase Seeder de Illuminate
use App\Models\Role;  // Importa la clase Role del modelo de la aplicación

class RolesTableSeeder extends Seeder  // Define la clase RolesTableSeeder que extiende Seeder
{
    // La función "run" se ejecutará al ejecutar el seeder
    public function run()
    {
        // Crea un nuevo registro de rol con el nombre 'admin'
        Role::create(['name' => 'admin']);
        
        // Crea otro nuevo registro de rol con el nombre 'user'
        Role::create(['name' => 'user']);
        
        // Agrega más roles
        // Role::create(['name' => 'nombre_del_rol']);
    }
} 

