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
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("mobile_number")->default("");
            $table->string("user_name")->unique();
            $table->string("password");
            $table->string("address")->default("");
            $table->bigInteger("role_id")->unsigned();
            $table->bigInteger("status_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('users',function (Blueprint $table){
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('user');
    }
}
