<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("gender");
            $table->string("nic")->unique();
            $table->string("address")->default("");
            $table->string("religion")->default("");
            $table->uuid("user_id");
            $table->timestamps();
        });
        Schema::table('patients',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
