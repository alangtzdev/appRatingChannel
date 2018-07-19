<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $table = 'cities';
   protected $primarykey = 'id_City';
   protected $fillable = ['nameCity', 'dateTimeDrop'];
}
