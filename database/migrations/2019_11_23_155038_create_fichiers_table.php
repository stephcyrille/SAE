<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('description');
            $table->string('type');
            $table->string('format');
            $table->string('localisation');
            $table->integer('document_id')->unsigned()->nullable();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('fichiers');
    }
}
