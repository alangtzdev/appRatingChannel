<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable;
   
   protected $guard = 'admin';
   
   protected $table = 'users';
   protected $primarykey = 'id_User';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
      'id_Rol', 'id_Employee', 'name', 'email', 'password', 'status'
   ];

   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   protected $hidden = [
      'password', 'remember_token',
   ];

   public function rol(){
      return $this->belongsTo('App\Models\Rol', 'id_Rol');
   }

   public function employee(){
      return $this->belongsTo('App\Models\Employee', 'id_Employee');
   }


}
