<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataKursusModel;
use App\dataSubKursusModel;
use App\dataMenuSubKursusModel;
use App\dataSubMenuKursusModel;
use App\dataTextKursusModel;
use App\Helpers\menuHome;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mentor;
use App\Peserta;
use Auth;
use DB;
use App\dataMentorKursus;
use App\dataMassageModel;

use App\dataTemaKursusModel;
use App\dataMessageKursusModel;
use App\dataRetingsKursusModel;
use App\dataForumKursusModel;
use App\dataMenuTemaModel;
use App\dataSubMenuTemaModel;
use App\dataReadingsModel;
use App\dataVideosModel;
use App\dataKuisModel;
use App\dataAudiosModel;
use App\dataSoalModel;
use App\dataMenuKursusModel;

class mentorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mentor')->except('setLogout');
    }
    public function home(){
        $auth = Auth::guard("mentor")->user();
        $dataKursus = dataMentorKursus::where("id_mentor", $auth->id_mentor)->orderBy("id_mentor_kursus", "desc")->get();
        $data = [];
        foreach ($dataKursus as $key => $datkur){
          $data[$key] = $datkur;
           $subKursus = dataSubKursusModel::find($datkur->id_sub_kursus);
           $data[$key]->subKursus = $subKursus;
           $data[$key]->dataKursus = dataKursusModel::find($subKursus->id_kursus);
        }
        //return $data;
        $in = 0; 
        return view("pages.mentor.home.index", compact("data", "in"));
    }
    public function massages()
    {
        $auth =   Auth::guard('mentor')->user()->id_mentor;
        $data = dataMassageModel::select('id_peserta', "id_mentor", "id_data_message")
                 ->groupBy('id_peserta', "id_mentor", "id_data_message")->orderBy("id_message", "desc")->where("id_mentor", $auth)->get();
        foreach ($data as $key => $dat){
          $data[$key]->peserta = Peserta::find($dat->id_peserta,["nama_lengkap"]);
          $dataMassage =  dataMessageKursusModel::find($dat->id_data_message);
          $dataSubMenu =  dataSubMenuKursusModel::find($dataMassage->id_data_message);
          $dataMenu =  dataMenuKursusModel::find($dataSubMenu->id_menu_kursus);
          $dataSubKursus =  dataSubKursusModel::find($dataMenu->id_sub_kursus,["judul_sub_kursus"]);

          $data[$key]->kursus = $dataSubKursus;
          $data[$key]->notif = dataMassageModel::where('id_peserta', $dat->id_peserta)->where("id_mentor", $dat->id_mentor)->where("id_data_message", $dat->id_data_message)->where("notif", 1)->count();
          $data[$key]->pesanTerakhir = dataMassageModel::where('id_peserta', $dat->id_peserta)->where("id_mentor", $dat->id_mentor)->where("id_data_message", $dat->id_data_message)->orderBy("id_message", "desc")->first();
          
        }
        //return $data;
        $in = 1; 
        return view("pages.mentor.home.message", compact("data", "in"));
    }
    public function setLogout()
    {
        auth()->guard('mentor')->logout();
        session()->flush();

        return redirect()->route('other.login');
    }
}
