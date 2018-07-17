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
         $table->string('name');
         $table->string('apPaterno');
         $table->string('apMaterno');
         $table->char('gender', 1);
         $table->date('dateBirth');
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
