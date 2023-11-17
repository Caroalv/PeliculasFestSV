<?php

namespace App\Models; // Declara el namespace para el modelo Language en la aplicación

use App\Movie; // Importa el modelo Movie para establecer la relación muchos a muchos
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory para facilitar la creación de instancias del modelo
use Illuminate\Database\Eloquent\Model; // Importa la clase Model de Eloquent

class Language extends Model // Declara la clase Language que extiende de la clase Model
{
    use HasFactory; // Utiliza el trait HasFactory para incorporar métodos de fabricación de instancias

    // Atributos que se pueden asignar de manera masiva (se especifica el atributo 'name')
    protected $fillable = ['name'];

    // Relación muchos a muchos con el modelo Movie, indicando que un idioma puede estar asociado a muchas películas
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'language_movie');
    }
}
