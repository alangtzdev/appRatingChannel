<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $primarykey = 'id_Program';
    protected $fillable = ['id_Gender','name','description','dateTimeDrop'];
   
   public function transmitions(){
      return $this->hasMany('App\Models\Transmition');
   }
   
   public function gender(){
      return $this->belongsTo('App\Models\Gender');
   }
}
