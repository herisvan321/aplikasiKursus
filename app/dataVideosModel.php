<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataVideosModel extends Model
{
    protected $table = "videos";
    public $primaryKey = "id_videos";
    public $timestamps = false;
}
