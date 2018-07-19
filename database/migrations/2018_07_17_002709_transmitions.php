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
         $table->unsignedInteger('id_TypeTransmition');
         $table->unsignedInteger('id_City');
         $table->date('day');
         $table->time('nationalTime');
         $table->decimal('RTG', 8, 2);
         $table->decimal('SH', 8, 2);
         $table->decimal('percentReach', 8, 2);
         $table->integer('AVGpercentViewed');
         $table->integer('HH');
         $table->integer('AA');
         $table->integer('totalHoursViewed');
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
