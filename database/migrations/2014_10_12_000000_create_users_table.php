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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('visible');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::create('access', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
        });

        Schema::create('roles_access', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('access_id');
            
            $table->primary(['role_id','access_id']);

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('access_id')->references('id')->on('access');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_access');
        Schema::dropIfExists('access');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
