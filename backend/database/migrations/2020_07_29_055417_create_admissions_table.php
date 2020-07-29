<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string("data")->default("");
            $table->uuid("user_id");
            $table->uuid("patient_id");
            $table->bigInteger("hospital_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('admissions',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('hospital_id')->references('id')->on('hospitals');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
