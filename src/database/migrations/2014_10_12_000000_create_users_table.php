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
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->boolean('email_verified')->default(0);
            $table->string('email_verify_token')->nullable();
            $table->boolean('status')->default(0)->comment('本会員登録済みか');
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name_ruby')->nullable();
            $table->string('last_name_ruby')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nickname')->nullable();
            $table->string('sex')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('company')->nullable();
            $table->string('department')->nullable();
            $table->integer('working_period')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('roles');
    }
}
