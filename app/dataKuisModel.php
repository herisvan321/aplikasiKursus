<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataKuisModel extends Model
{
    protected $table = "kuis";
    public $primaryKey = "id_kuis";
    public $timestamps = false;
}
