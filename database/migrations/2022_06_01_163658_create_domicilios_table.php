<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('domiciliable_id');
            $table->string('domiciliable_type');
            $table->string("calle")->nullable();
            $table->string("numero_interior")->nullable();
            $table->string("numero_exterior")->nullable();
            $table->string("codigo_postal")->nullable();
            $table->string("localidad")->nullable();
            $table->string("municipio")->nullable();
            $table->string("estado")->nullable();
            $table->index(['domiciliable_id', 'domiciliable_type']);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilios');
    }
}
