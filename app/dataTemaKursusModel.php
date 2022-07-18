<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataTemaKursusModel extends Model
{
    protected $table = "data_tema";
    public $primaryKey = "id_data_tema";
    public $timestamps = false;
}
