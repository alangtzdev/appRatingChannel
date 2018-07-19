<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransmition extends Model
{
   protected $table = 'typetransmition';
   protected $primarykey = 'id_TypeTransmition';
   protected $fillable = ['nameTransmition', 'dateTimeDrop'];
}
