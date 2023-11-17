<?php

namespace App\Models; // Declara el namespace para el modelo User en la aplicación

use Illuminate\Contracts\Auth\MustVerifyEmail; // Importa la interfaz MustVerifyEmail para la verificación de correo electrónico
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory para facilitar la creación de instancias del modelo
use Illuminate\Foundation\Auth\User as Authenticatable; // Importa la clase Authenticatable para autenticación de usuarios
use Illuminate\Notifications\Notifiable; // Importa el trait Notifiable para el envío de notificaciones
use Laravel\Sanctum\HasApiTokens; // Importa el trait HasApiTokens para la autenticación mediante tokens API

class User extends Authenticatable implements MustVerifyEmail // Declara la clase User que extiende de la clase Authenticatable e implementa MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable; // Utiliza los traits HasApiTokens, HasFactory, y Notifiable

    // Atributos que se pueden asignar de manera masiva (se especifican los atributos 'name', 'email', y 'password')
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Atributos ocultos (se especifican los atributos 'password' y 'remember_token')
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atributos que se deben convertir a tipos nativos (se especifica 'email_verified_at' como tipo 'datetime')
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Método para asignar un rol al usuario
    public function assignRole(Role $role)
    {
        return $this->roles()->sync($role, false);
    }

    // Método para verificar si el usuario tiene un rol específico
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    // Relación muchos a muchos con el modelo Role, indicando que un usuario puede tener muchos roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
