<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
   protected $table = 'roles';
   protected $primarykey = 'id_Rol';
   protected $fillable = ['name', 'description', 'status'];
   
   public function users(){
      return $this->hasMany('App\Models\User', 'id_Rol');
   }
}
