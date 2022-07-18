<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataPesertaKuisModel extends Model
{
    protected $table = "peserta_kuis";
    public $primaryKey = "id_peserta_kuis";
    public $timestamps = false;
}
