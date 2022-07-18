<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataStepModel extends Model
{
    protected $table = "step_tema";
    public $primaryKey = "id_step";
    public $timestamps = false;
}
