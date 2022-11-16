<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('user_id')->autoIncrement();
            $table->string('user_name', 20);
            $table->string('user_email', 30)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('user_phone', 10)->nullable();
            $table->string('user_addres')->nullable();
            $table->integer('user_district')->nullable();
            $table->integer('user_city')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('role_id');
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
