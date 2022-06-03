<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoRegimensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_regimens', function (Blueprint $table) {
            $table->id();
            $table->string('regimen');
            $table->timestamps();
        });

        $path = base_path("database/catalogos/json/regimen.json");
        $json = json_decode(file_get_contents($path));
        foreach ($json as $regimen) {
            DB::table("tipo_regimens")->insert([
                "regimen" => $regimen->regimen,
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
        Schema::dropIfExists('tipo_regimens');
    }
}
