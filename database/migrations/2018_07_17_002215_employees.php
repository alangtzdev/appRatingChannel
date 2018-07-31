<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('employees', function (Blueprint $table) {
         $table->increments('id_Employee');
         $table->string('name')->nullable();
         $table->string('apPaterno')->nullable();
         $table->string('apMaterno')->nullable();
         $table->char('gender', 1)->nullable();
         $table->string('dateBirth')->nullable();
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
      Schema::dropIfExists('employees');
   }
}
