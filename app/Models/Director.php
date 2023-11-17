<?php

namespace App\Models;
use App\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Director extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
