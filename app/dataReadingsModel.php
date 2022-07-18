<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataReadingsModel extends Model
{
    protected $table = "readings";
    public $primaryKey = "id_readings";
    public $timestamps = false;
}
