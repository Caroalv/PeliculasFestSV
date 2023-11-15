<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Crear tabla 'countries'
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Crear tabla 'languages'
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Crear tabla 'directors'
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
            // Crear tabla 'movies'
            Schema::create('movies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('year', 8);
                $table->enum('classification', ['U', 'PG', '12A', '+15', '+18']);
                $table->text('poster');
                $table->boolean('rented')->default(false);
                $table->text('synopsis');
                $table->string('movie_url');
                $table->timestamps();
    
                // Agregar llaves foráneas
                $table->foreignId('genre_id')->constrained();
                $table->foreignId('country_id')->constrained();
                $table->foreignId('language_id')->constrained();
                $table->foreignId('director_id')->constrained();
            });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
