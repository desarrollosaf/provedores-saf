<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contactable_id');
            $table->string('contactable_type');
            $table->string("nombre_contacto")->nullable();
            $table->string("email")->nullable();
            $table->string("telefono")->nullable();
            $table->string("fax")->nullable();
            $table->string("url")->nullable();
            $table->index(['contactable_id', 'contactable_type']);
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
        Schema::dropIfExists('contactos');
    }
}
