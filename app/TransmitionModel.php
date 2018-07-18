<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmitionModel extends Model
{
    protected $table = 'transmitions';
    protected $primarykey = 'id_Transmition';
    protected $fillable = ['id_Program','id_TypeTransmition','id_City',
    'day','nationalTime','RTG','SH','percentReach','AVGpercentViewed',
    'HH','AA','totalHoursViewed'];
}
