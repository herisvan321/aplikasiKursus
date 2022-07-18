<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class menuHome {
    public static function get_menu($idsubkursus) {
        $didsubkursus = base64_decode($idsubkursus);
        $menu = DB::table('menu_kursus')->where("id_sub_kursus", $didsubkursus)->where("status_menu_kursus", 0)->get();
        foreach($menu as $key => $dat){
            $menu[$key]->sub = DB::table('sub_menu_kursus')->where("id_menu_kursus", $dat->id_menu_kursus)->where("status_sub_menu_kursus", 0)->get();
        }
        return $menu;
    }
    public static function get_menu_tema($iddatatema) {
        $di = base64_decode($iddatatema);
        $menu = DB::table('menu_tema')->where("id_data_tema", $di)->where("status_menu_tema", 0)->get();
        foreach($menu as $key => $dat){
            $menu[$key]->sub = DB::table('sub_menu_tema')->where("id_menu_tema", $dat->id_menu_tema)->where("status_sub_menu_tema", 0)->get();
        }
        return $menu;
    }
    public static function get_message($idUser, $level){
        $di = base64_decode($idUser);
        if($level == "mentor"){
          $message = DB::table('message')->where("id_mentor", $di)->where("notif", 1)->count();
        }elseif($level == "peserta"){
          $message = DB::table('message')->where("id_peserta", $di)->where("notif", 1)->count();
        }
        return $message;
    }
}