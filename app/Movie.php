<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //protected $guarded=[];

    protected $casts = [
        "rented" => "boolean",
    ];

    protected $fillable = [
        'title', 'gender','year', 'classification', 'director', 'poster', 'synopsis', 'original_language','movie_url', 'rented'
    ];
}