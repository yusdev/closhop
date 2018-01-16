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
            $table->string('shop_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('cellphone')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('location')->nullable();
            $table->integer('postalcode')->nullable();
            $table->integer('dni_cuit')->nullable();
            $table->string('user_type');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('complete')->default(0);
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
