<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $table = 'employees';
   protected $primarykey = 'id_Employee';
   protected $fillable = ['name', 'apPaterno', 'apMaterno', 'gender', 'dateBirth'];
   
   public function user()
   {

      return $this->hasOne('App\Models\User');
   }
}
