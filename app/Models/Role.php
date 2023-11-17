<?php

namespace App\Models; // Declara el namespace para el modelo Role en la aplicación

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory para facilitar la creación de instancias del modelo
use Illuminate\Database\Eloquent\Model; // Importa la clase Model de Eloquent

class Role extends Model // Declara la clase Role que extiende de la clase Model
{
    use HasFactory; // Utiliza el trait HasFactory para incorporar métodos de fabricación de instancias

    // Relación muchos a muchos con el modelo User, indicando que un rol puede estar asociado a muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
