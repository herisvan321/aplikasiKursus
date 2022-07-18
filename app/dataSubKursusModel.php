<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataSubKursusModel extends Model
{
    protected $table = "sub_kursus";
    public $primaryKey = "id_sub_kursus";
    public $timestamps = false;
}
