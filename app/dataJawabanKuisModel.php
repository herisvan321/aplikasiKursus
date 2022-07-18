<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataJawabanKuisModel extends Model
{
    protected $table = "jawaban_kuis";
    public $primaryKey = "id_jawaban_kuis";
    public $timestamps = false;
}
