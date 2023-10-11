<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializedHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SpecializedHospital', function (Blueprint $table) {
            $table->increments('sh_id');
            $table->string('sh_name')->nullable();
            $table->string('Region')->nullable();
            $table->string('Zone')->nullable();
            $table->string('Wereda')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Service')->nullable();
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('SpecializedHospital');
    }
}
