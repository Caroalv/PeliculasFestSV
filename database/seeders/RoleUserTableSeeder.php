<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        // Asigna el rol 'admin' al usuario con ID 1
        User::find(1)->assignRole(Role::where('name', 'admin')->first());

        // Asigna el rol 'usuario' al usuario con ID 2
        User::find(2)->assignRole(Role::where('name', 'user')->first());
    }
}
