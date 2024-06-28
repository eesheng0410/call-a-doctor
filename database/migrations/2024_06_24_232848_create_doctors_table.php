<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('specialization');
            $table->unsignedBigInteger('clinic_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
