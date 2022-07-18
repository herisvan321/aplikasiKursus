<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataKursusModel extends Model
{
    protected $table = "data_kursus";
    public $primaryKey = "id_kursus";
    public $timestamps = false;
}
