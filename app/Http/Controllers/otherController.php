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

class otherController extends Controller
{
    use AuthenticatesUsers;

    public function details($id, $kondisi = FALSE)
    {
        $data_id = base64_decode($id);

        if ($kondisi == true) {
            $cek = dataSubKursusModel::find($data_id);
            $data = dataKursusModel::find($cek->id_kursus);
            $data->child = $cek;
            $data->sub = dataSubKursusModel::where("id_kursus", $data->id_kursus)->where("status_sub_kursus", 0)->get();
            $kondisi = 1;
        } else {
            $data = dataKursusModel::find($data_id);
            $data->sub = dataSubKursusModel::where("id_kursus", $data->id_kursus)->where("status_sub_kursus", 0)->get();
            $kondisi = 0;
        }
        return view("pages.other.details", compact("data", "kondisi"));
    }
    
    
    public function index()
    {
        $data = dataKursusModel::where("status_kursus", 0)->orderBy("id_kursus", "desc")->get();
        return view("pages.other.index", compact("data"));
    }
    public function about()
    {
        return view("pages.other.index");
    }
    public function tutor()
    {
        $data = Mentor::where("status_mentor", 1)->get();
        return view("pages.other.tutor", compact("data"));
    }
    public function setregister(Request $r)
    {
        $r->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:pesertas',
            'email' => 'required|unique:pesertas',
            'password' => 'required'
        ]);
        $i = new Peserta();
        $i->nama_lengkap = $r->nama_lengkap;
        $i->username = $r->username;
        $i->email = $r->email;
        $i->password = Hash::make($r->password);
        $i->status_peserta = 1;
        $i->save();
        if ($i) {
            return redirect()->route("other.login")->with('success', 'Silahkan Login');
        } else {
            return redirect()->back()->with('error', 'Prosess Gagal');
        }
        // return view("pages.other.register");
    }
    public function indexMentor(){
        $kondisi = 1;
        return view("pages.other.login", compact("kondisi"));
    }
    public function setLoginMentor(Request $r){
        $this->validate($r, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->guard('mentor')->attempt($r->only('email', 'password'))) {
            $r->session()->regenerate();
            $this->clearLoginAttempts($r);
            return redirect()->intended(route("mentor.home"));
            //return auth()->guard('mentor')->user();
        } else {
            $this->incrementLoginAttempts($r);
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }
    public function register()
    {
        return view("pages.other.register");
    }
    
    public function login()
    {
        $kondisi = 0;
        return view("pages.other.login", compact("kondisi"));
    }
    public function setLogin(Request $r){
        $this->validate($r, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('peserta')->attempt($r->only('email', 'password'))) {
            $r->session()->regenerate();
            $this->clearLoginAttempts($r);
            return redirect()->intended(route("peserta.home"));
            // auth()->guard('peserta')->user();
        } else {
            $this->incrementLoginAttempts($r);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }
    public function contact()
    {
        return view("pages.other.contact");
    }
}
