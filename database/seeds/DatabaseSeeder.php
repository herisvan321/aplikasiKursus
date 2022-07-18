<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table("pesertas")->insert([
            'nama_lengkap' => "herisvan hendra",
            'username' => "herisvan",
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'status_peserta' => 1
        ]);
    }
}
