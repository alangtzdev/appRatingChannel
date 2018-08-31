<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transmition extends Model
{
    protected $table = 'transmitions';
    protected $primarykey = 'id_Transmition';
    public $fillable = ['id_Program','id_TypeTransmition',
    'day','nationalTime','runTime','RTG','SH','percentReach','AVGpercentViewed',
    'HH','AA','totalHoursViewed','created_at','updated_at'];
   
   public function program(){
      return $this->belongsTo('App\Models\Program', 'id_Program');
   }
   
   public function typetransmition(){
      return $this->belongsTo('App\Models\TypeTransmition', 'id_TypeTransmition');
   }
   
}
