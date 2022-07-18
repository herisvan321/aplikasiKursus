<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataMessageKursusModel extends Model
{
    protected $table = "data_message";
    public $primaryKey = "id_data_message";
    public $timestamps = false;

}
