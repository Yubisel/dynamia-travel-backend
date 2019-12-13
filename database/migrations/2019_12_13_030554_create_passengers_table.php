<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            //id, cédula, nombre, teléfono, email
            $table->integer('id')->autoIncrement();
            $table->date('ci');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('travel_id');
            $table->foreign('travel_id')->references('id')->on('travels');
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
        Schema::table('passengers', function (Blueprint $table) {
            Schema::dropIfExists('passengers');
        });
    }
}
