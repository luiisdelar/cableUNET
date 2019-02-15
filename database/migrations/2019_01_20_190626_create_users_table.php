<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->unique();
            $table->string('email',30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',30)->required();
            $table->string('first_name',30)->required();
            $table->string('last_name',30)->required();
            $table->enum('type',['user','admin'])->default('user');
            $table->integer('packservice_id')->unsigned()->default('null');
            $table->integer('cable_id')->unsigned()->default('null');
            $table->integer('internet_id')->unsigned()->default('null');
            $table->integer('telephone_id')->unsigned()->default('null');
            $table->foreign('packservice_id')->references('id')->on('packservices')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
