<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string("clave");
            $table->string("entidad");
            $table->string("abreviatura");
            $table->timestamps();
        });

        $path = base_path("database/catalogos/json/entidades.json");
        $json = json_decode(file_get_contents($path));
        foreach ($json as $tipo_inmueble) {
            DB::table("entidades")->insert([
                "clave" => $tipo_inmueble->cve_agee,
                "entidad" => $tipo_inmueble->nom_agee,
                "abreviatura" => $tipo_inmueble->abrev_agee,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades');
    }
}
