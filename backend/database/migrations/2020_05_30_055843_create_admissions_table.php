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
            $table->string('name');
            $table->string('g_name');
            $table->bigInteger('opd_doctor_id')->unsigned();
            $table->string('birth_place')->default("");
            $table->string('address');
            $table->string('religion');
            $table->integer('ward_no');
            $table->string('nic', 100);
            $table->date('dob');
            $table->string('gender');
            $table->string('occupation', 100)->default('');
            $table->string('note')->default("");
            $table->timestamps();
        });
        Schema::table('admissions',function (Blueprint $table){
            $table->foreign('opd_doctor_id')->references('id')->on('doctors');
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
