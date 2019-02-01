<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packservices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique();
            $table->double('price')->required();
            $table->integer('internet_id')->unsigned()->default('null');
            $table->integer('telephone_id')->unsigned()->default('null');
            $table->integer('cable_id')->unsigned()->default('null');
            $table->foreign('internet_id')->references('id')->on('internets')->onDelete('cascade');
            $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
            $table->foreign('cable_id')->references('id')->on('cables')->onDelete('cascade');
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
        Schema::dropIfExists('packservices');
    }
}
