<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->unsignedBigInteger("regimen_id");
            $table->foreign("regimen_id")->references("id")->on("tipo_regimens");
            $table->timestamps();
        });

        $path = base_path("database/catalogos/json/documentos.json");
        $json = json_decode(file_get_contents($path));

        foreach ($json as $documento) {
            DB::table("tipo_documentos")->insert([
                "documento" => $documento->documento,
                "regimen_id" => $documento->regimen_id,
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
        Schema::dropIfExists('tipo_documentos');
    }
}
