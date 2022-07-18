<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataMenuKursusModel extends Model
{
    protected $table = "menu_kursus";
    public $primaryKey = "id_menu_kursus";
    public $timestamps = false;
}
