<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataMassageModel extends Model
{
    protected $table = "message";
    public $primaryKey = "id_message";
    public $timestamps = false;
}
