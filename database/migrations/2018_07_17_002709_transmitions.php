<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transmitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmitions', function (Blueprint $table) {
            $table->increments('id_Transmition');

            
            $table->unsignedInteger('id_Program');
            $table->foreign('id_Program')->references('id')->on('programs');

            $table->unsignedInteger('id_TypeTransmition');
            $table->foreign('id_TypeTransmition')->references('id')->on('typeTransmitions');

            $table->unsignedInteger('id_City');
            $table->foreign('id_City')->references('id')->on('cities');

            $table->date('day');
            $table->time('nationalTime');
            $table->decimal('RTG', 8, 2);
            $table->decimal('SH', 8, 2);
            $table->decimal('percentReach', 8, 2);
            $table->integer('AVGpercentViewed');
            $table->integer('HH');
            $table->integer('AA');
            $table->integer('totalHoursViewed');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transmitions');
        //
    }
}
