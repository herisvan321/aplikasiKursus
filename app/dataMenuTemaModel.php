<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataMenuTemaModel extends Model
{
    protected $table = "menu_tema";
    public $primaryKey = "id_menu_tema";
    public $timestamps = false;
}
