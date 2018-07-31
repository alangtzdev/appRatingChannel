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
         $table->unsignedInteger('id_Program')->nullable();
         $table->unsignedInteger('id_TypeTransmition')->nullable();
         $table->unsignedInteger('id_City')->nullable();
         $table->date('day')->nullable();
         $table->time('nationalTime')->nullable();
         $table->decimal('RTG', 8, 2)->nullable();
         $table->decimal('SH', 8, 2)->nullable();
         $table->decimal('percentReach', 8, 2)->nullable();
         $table->integer('AVGpercentViewed')->nullable();
         $table->integer('HH')->nullable();
         $table->integer('AA')->nullable();
         $table->integer('totalHoursViewed')->nullable();
         $table->timestamps();
      });
      //
      Schema::table('transmitions', function (Blueprint $table) {
         $table->foreign('id_Program')->references('id_Program')->on('programs');
         $table->foreign('id_TypeTransmition')->references('id_TypeTransmition')->on('typeTransmition');
         $table->foreign('id_City')->references('id_City')->on('cities');

      });
   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::dropIfExists('transmitions');
   }
}
