<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataPesertaKursus extends Model
{
    protected $table = "peserta_kursus";
    public $primaryKey = "id_peserta_kursus";
    public $timestamps = false;
}
