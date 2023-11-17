<?php

namespace Database\Seeders;  // Define el espacio de nombres para el seeder

use Illuminate\Database\Seeder;  // Importa la clase Seeder de Illuminate
use App\Models\User;  // Importa la clase User del modelo de la aplicación
use App\Models\Role;  // Importa la clase Role del modelo de la aplicación

class RoleUserTableSeeder extends Seeder  // Define la clase RoleUserTableSeeder que extiende Seeder
{
    // La función "run" se ejecutará al ejecutar el seeder
    public function run()
    {
        // Asigna el rol 'admin' al usuario con ID 1
        User::find(1)->assignRole(Role::where('name', 'admin')->first());

        // Asigna el rol 'user' al usuario con ID 2
        User::find(2)->assignRole(Role::where('name', 'user')->first());
    }
} 

