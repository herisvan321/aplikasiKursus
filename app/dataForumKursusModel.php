<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataForumKursusModel extends Model
{
    protected $table = "data_forum";
    public $primaryKey = "id_data_forum";
    public $timestamps = false;
}
