<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $primarykey = 'id_Program';
    protected $fillable = ['id_Gender','name','description','dateTimeDrop'];
}
