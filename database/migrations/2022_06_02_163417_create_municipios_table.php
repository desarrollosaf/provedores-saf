<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Entidades;


class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string("clave");
            $table->string("municipio");
            $table->unsignedBigInteger("entidad_id");
            $table->string("clave_estado");
            $table->foreign("entidad_id")->references("id")->on("entidades");
            $table->timestamps();
            $table->softDeletes();
        });

        $path = base_path("database/catalogos/json/municipios.json");
        $json = json_decode(file_get_contents($path));
        foreach($json as $tipo_inmueble){
            $entidad = Entidades::where("clave",$tipo_inmueble->cve_agee)->first();
            
            DB::table("municipios")->insert([
                "clave" => $tipo_inmueble->cve_agem,
                "municipio" => $tipo_inmueble->nom_agem,
                "clave_estado" => $tipo_inmueble->cve_agee,
                "entidad_id" => $entidad->id
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
        Schema::dropIfExists('municipios');
    }
}
