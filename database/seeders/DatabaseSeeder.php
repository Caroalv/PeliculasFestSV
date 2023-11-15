<?php

use Database\Seeders\RolesTableSeeder;
use Database\Seeders\RoleUserTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Movie;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private function seedUsers(){
        // Borramos los datos de la tabla
        DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin2023'),
        ]);
        
        // Añadimos una entrada a esta tabla
        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('usuario2023'),
        ]);
    }

    private function assignAdminRole()
    {
        // Asignamos el rol 'admin' al usuario con el email 'admin@gmail.com'
        $adminRole = Role::where('name', 'admin')->first();
        $user = User::where('email', 'admin@gmail.com')->first();

        if ($adminRole && $user) {
            $user->assignRole($adminRole);
        }

        // Asignamos el rol 'user' al usuario con el email 'usuario@gmail.com'
        $userRole = Role::where('name', 'user')->first();
        $userUser = User::where('email', 'user@gmail.com')->first();

        if ($userRole && $userUser) {
            $userUser->assignRole($userRole);
        }
    }

    public function run()
    {
        self::seedUsers();
        $this->command->info('Tabla usuarios fue inicializada con datos');
        $this->assignAdminRole();
        $this->command->info('Rol de administrador asignado al usuario!');

        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);

    }
}