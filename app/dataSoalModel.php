<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataSoalModel extends Model
{
    protected $table = "soal";
    public $primaryKey = "id_soal";
    public $timestamps = false;
}
