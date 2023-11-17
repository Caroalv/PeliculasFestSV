<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $casts = [
        "rented" => "boolean",
    ];

    protected $fillable = [
        'title', 'year', 'classification', 'poster', 'synopsis', 'movie_url', 'rented',
        'genre_id', 'country_id', 'language_id', 'director_id', // Añadido para las llaves foráneas
    ];

    public function genre()
    {
        return $this->belongsTo(\App\Models\Genre::class);
    }

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);    }

    public function language()
    {
        return $this->belongsTo(\App\Models\Language::class);    }
// En tu modelo Movie
public function director()
{
    return $this->belongsTo(\App\Models\Director::class);
}
}
