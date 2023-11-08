<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('gender')->after('title')->nullable(false);
            $table->enum('classification', ['U', 'PG', '12A', '+15', '+18'])->after('year')->nullable(false);
            $table->string('country')->after('synopsis')->nullable(false); // Agregar el campo país después de la sinopsis
            $table->string('original_language')->after('country')->nullable(false); // Agregar el campo idioma original después del país
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['gender', 'classification', 'country', 'original_language']); // También debes eliminar el campo país e idioma original al deshacer la migración
        });
    }
}
