<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataRetingsKursusModel extends Model
{
    protected $table = "data_ratings";
    public $primaryKey = "id_data_ratings";
    public $timestamps = false;
}
