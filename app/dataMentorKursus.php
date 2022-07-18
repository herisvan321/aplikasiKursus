<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataMentorKursus extends Model
{
    protected $table = "mentor_kursus";
    public $primaryKey = "id_mentor_kursus";
    public $timestamps = false;
}
