<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataTextKursusModel extends Model
{
    protected $table = "data_text";
    public $primaryKey = "id_data_text";
    public $timestamps = false;
}
