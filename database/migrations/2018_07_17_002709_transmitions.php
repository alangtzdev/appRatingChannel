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
         $table->date('day')->nullable();
         $table->time('nationalTime')->nullable();
         $table->integer('runTime')->nullable();
         $table->decimal('RTG', 8, 4)->nullable();
         $table->decimal('SH', 8, 4)->nullable();
         $table->decimal('percentReach', 8, 5)->nullable();
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
