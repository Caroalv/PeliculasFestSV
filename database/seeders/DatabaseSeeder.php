<?php

use App\Models\Role; // Importa el modelo Role para interactuar con la tabla 'roles'
use App\Models\User; // Importa el modelo User para interactuar con la tabla 'users'
use Illuminate\Database\Seeder; // Importa la clase Seeder para la creación de semillas (seeds)
use Database\Seeders\GenreSeeder; // Importa el seeder GenreSeeder para poblar la tabla 'genres'
use Database\Seeders\MovieSeeder; // Importa el seeder MovieSeeder para poblar la tabla 'movies'
use Illuminate\Support\Facades\DB; // Importa la fachada DB para interactuar con la base de datos
use Database\Seeders\CountrySeeder; // Importa el seeder CountrySeeder para poblar la tabla 'countries'
use Database\Seeders\DirectorSeeder; // Importa el seeder DirectorSeeder para poblar la tabla 'directors'
use Database\Seeders\LanguageSeeder; // Importa el seeder LanguageSeeder para poblar la tabla 'languages'
use Database\Seeders\RolesTableSeeder; // Importa el seeder RolesTableSeeder para poblar la tabla 'roles'
use Database\Seeders\RoleUserTableSeeder; // Importa el seeder RoleUserTableSeeder para poblar la tabla 'role_user'

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private function seedUsers()
    {
        // Borra los datos de la tabla 'users'
        DB::table('users')->delete();

        // Añade una entrada a la tabla 'users' para el usuario 'Admin'
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin2023'),
        ]);

        // Añade una entrada a la tabla 'users' para el usuario 'Usuario'
        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('usuario2023'),
        ]);
    }

    private function assignAdminRole()
    {
        // Asigna el rol 'admin' al usuario con el email 'admin@gmail.com'
        $adminRole = Role::where('name', 'admin')->first();
        $user = User::where('email', 'admin@gmail.com')->first();

        if ($adminRole && $user) {
            $user->assignRole($adminRole);
        }

        // Asigna el rol 'user' al usuario con el email 'usuario@gmail.com'
        $userRole = Role::where('name', 'user')->first();
        $userUser = User::where('email', 'usuario@gmail.com')->first();

        if ($userRole && $userUser) {
            $userUser->assignRole($userRole);
        }
    }

    public function run()
    {
        // Llama al método seedUsers para poblar la tabla 'users'
        self::seedUsers();
        $this->command->info('Tabla usuarios fue inicializada con datos');

        // Asigna el rol de administrador al usuario 'Admin'
        $this->assignAdminRole();
        $this->command->info('Rol de administrador asignado al usuario!');

        // Llama a varios seeders para poblar diferentes tablas
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(MovieSeeder::class);
    }
}
