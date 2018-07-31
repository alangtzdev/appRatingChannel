<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
   protected $table = 'genders';
   protected $primarykey = 'id_Gender';
   protected $fillable = ['name', 'dateTimeDrop'];
   
   public function programs(){
      return $this->hasMany('App\Models\Program', 'id_Gender');
   }
}
