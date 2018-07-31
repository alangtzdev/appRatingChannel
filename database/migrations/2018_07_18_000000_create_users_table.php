<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('users', function (Blueprint $table) {
         $table->increments('id_User');
         $table->unsignedInteger('id_Rol')->nullable();
         $table->unsignedInteger('id_Employee')->nullable();
         $table->string('name')->nullable();
         $table->string('email')->unique();
         $table->string('password')->nullable();
         $table->rememberToken();
         $table->timestamps();

        
      });
      //
      Schema::table('users', function (Blueprint $table) {

        $table->foreign('id_Rol')->references('id_Rol')->on('roles');
        $table->foreign('id_Employee')->references('id_Employee')->on('employees');

     });
   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::dropIfExists('users');
   }
}
