<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataAudiosModel extends Model
{
    protected $table = "audios";
    public $primaryKey = "id_audios";
    public $timestamps = false;
}
