<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Peserta extends Authenticable
{
    use Notifiable;

    protected $table = "pesertas";
    public $primaryKey = "id_peserta";
    public $timestamps = false;

    protected $guard = 'peserta';

    protected $fillable = [
        'nama_lengkap', 'email', 'username', 'password'
    ];

    protected $hidden = ['password', 'status_peserta'];
}
