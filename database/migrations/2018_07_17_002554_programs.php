<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Programs extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('programs', function (Blueprint $table) {
         $table->increments('id_Program');
         $table->string('name');
         $table->string('description', 100);
         $table->dateTime('dateTimeDrop');
         $table->timestamps();
         
         $table->unsignedInteger('id_Gender');
         $table->foreign('id_Gender')->references('id_Gender')->on('genders');
      });
   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::dropIfExists('programs');
   }
}
