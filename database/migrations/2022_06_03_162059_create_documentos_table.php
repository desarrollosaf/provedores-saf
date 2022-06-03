<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger("tipo_documento_id");
            $table->foreign("tipo_documento_id")->references("id")->on("tipo_documentos");
            $table->unsignedBigInteger("datos_generales_id");
            $table->foreign("datos_generales_id")->references("id")->on("datos_generales");
            $table->boolean('validado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
