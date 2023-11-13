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

    }
}