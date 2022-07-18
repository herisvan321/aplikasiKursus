<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataKursusModel;
use App\dataSubKursusModel;
use App\dataMenuSubKursusModel;
use App\dataSubMenuKursusModel;
use App\dataTextKursusModel;
use App\dataPesertaKursus;
use App\dataPesertaKuisModel;
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
use App\dataStepModel;
use App\dataJawabanKuisModel;
use App\Helpers\menuHome;
use Auth;

class pesertaController extends Controller
{
  public function __construct() {
    $this->middleware('auth:peserta')->except('setLogout');
  }
  public function SimpanJawabanKuis(Request $r, $idKuis, $noSoal, $idPesertaKuis) {
    $didKuis = base64_decode($idKuis);
    $dnoSoal = base64_decode($noSoal);
    $didPesertaKuis = base64_decode($idPesertaKuis);
    //namasaya adalah sebagai berikut


    $Soal = dataSoalModel::where('id_kuis', $didKuis)->where("no_soal", $dnoSoal)->where("status_soal", 0)->first();
    $jawaban = $r->jawaban;
    $skor = 0;
    if ($jawaban == $soal->jawaban) {
      $kondisi = "benar";
      $skor = $Soal->skor_soal;
    } else {
      $kondisi = "salah";
    }
    $cekJawaban = dataJawabanKuisModel::where("id_peserta_kuis", $didPesertaKuis)->where("id_soal", $Soal->id_soal)->first();
    if (@count($cekJawaban) > 0) {
      $i = dataJawabanKuisModel::find($cekJawaban->id_jawaban_kuis);
      $i->kondisi = $kondisi;
      $i->jawaban = $jawaban;
      $i->skor = $skor;
      $i->update();
    } else {
      $i = new dataJawabanKuisModel();
      $i->id_peserta_kuis = $didPesertaKuis;
      $i->kondisi = $kondisi;
      $i->jawaban = $jawaban;
      $i->skor = $skor;
      $i->id_soal = $Soal->id_soal;
      $i->save();
    }

  }
  public function kuisSoal(Request $r, $idKuis, $noSoal, $idPesertaKuis) {
    $didKuis = base64_decode($idKuis);
    $dnoSoal = base64_decode($noSoal);
    $didPesertaKuis = base64_decode($idPesertaKuis);


    $Soal = dataSoalModel::where('id_kuis', $didKuis)->where("no_soal", $dnoSoal)->where("status_soal", 0)->first();

    $next = 0;
    $prev = 0;

    $cekNext = dataSoalModel::where('id_kuis', $didKuis)->where("no_soal", ">", $dnoSoal)->where("status_soal", 0)->orderBy("no_soal", "asc")->first();
    $cekPrev = dataSoalModel::where('id_kuis', $didKuis)->where("no_soal", "<", $dnoSoal)->where("status_soal", 0)->orderBy("no_soal", "desc")->first();
    if (@count($cekNext) > 0) {
      $next = 1;
    }
    if (@count($cekPrev) > 0) {
      $prev = 1;
    }
    return 0;
  }
  public function updateKuis($idPesertaKuis) {
    $di = base64_decode($idPesertaKuis);
    $cekPesertaKuis = dataPesertaKuisModel::find($di);
    $cekKuis = dataKuisModel::find($cekPesertaKuis->id_kuis);
    $cekSoal = dataSoalModel::where('id_kuis', $cekPesertaKuis->id_kuis)->where("status_soal", 0)->get();
    $skor = 0;
    $benar = 0;
    $salah = 0;
    foreach ($cekSoal as $key => $dat) {
      $jawabanKuis = dataJawabanKuisModel::where("id_soal", $dat->id_soal)->where('id_peserta_kuis', $cekPesertaKuis->id_peserta_kuis)->first();
      $skor = += $jawabanKuis->skor;
      if ($jawabanKuis->kondisi == "benar") {
        $benar += 1;
      } elseif ($jawabanKuis->kondisi == "salah") {
        $salah += 1;
      }
    }
    $cekPesertaKuis->waktu_selesai = date('Y-m-d H:i:s');
    $cekPesertaKuis->jlm_benar = $benar;
    $cekPesertaKuis->jlm_salah = $salah;
    $cekPesertaKuis->nilai = $skor;
    $cekPesertaKuis->kondisi_peserta_kuis = 1;
    /*
    0 = proses
    1 = coba lagi
    2 = lulus
    */
    if ($skor > 70 && $skor <= 100) {
      $status = 2;
    } else {
      $status = 1;
    }
    $cekPesertaKuis->status_kuis_peserta = $status;
    $cekPesertaKuis->update;
    return 0;

  }
  public function kuisSoalSelesai($idKuis, $noSoal, $idPesertaKuis) {
    $data = dataPesertaKuisModel::find(base64_decode($idPesertaKuis));
    return 0;
  }
  public function konfirmasiKuis($id) {
    $di = base64_decode($id);
    $auth = Auth::guard('peserta')->user()->id_peserta;
    $dataKuis = dataKuisModel::find($di);
    $tglSekarang = date("YmdHis");

    $cekPesertaKuis = dataPesertaKuisModel::where('id_kuis', $di)->where('id_peserta', $auth)->where("kondisi_peserta_kuis", 0)->orderBy("id_peserta_kuis", "desc")->first();
    $cekSoal = dataSoalModel::where('id_kuis', $di)->where("status_soal", 0)->orderBy("no_soal", "asc")->first();
    if (@count($cekPesertaKuis) > 0) {
      $waktuBerakhir = date("YmdHis", strtotime($cekPesertaKuis->waktu_berakhir));
      if ($tglSekarang > $waktuBerakhir) {
        return redirect()->route('kuis.soal.selesai', [$id, base64_encode($cekSoal->no_soal), base64_encode($cekPesertaKuis->id_peserta_kuis)]);
      } else {
        return redirect()->route('kuis.soal', [$id, base64_encode($cekSoal->no_soal), base64_encode($cekPesertaKuis->id_peserta_kuis)]);
      }
    } else {
      $i = new dataPesertaKuisModel();
      $i->id_kuis = $di;
      $i->id_peserta = $auth;
      $i->ujian_ke = $cekPesertaKuis > 0 ? $cekPesertaKuis->ujian_ke + 1 : 1;
      $i->waktu_mulai = date('Y-m-d H:i:s');
      $i->waktu_berakhir = date('Y-m-d H:i:s', strtotime('+'. $dataKuis->waktu  .' minutes', strtotime('now')));;
      $i->kondisi_peserta_kuis = 0;
      $i->status_kuis_peserta = 0;
      $i->save();

      $cekPesertaKuis = dataPesertaKuisModel::where('id_kuis', $id)->where('id_peserta', $auth)->where("kondisi_peserta_kuis", 0)->orderBy("id_peserta_kuis", "desc")->first();

      return redirect()->route('kuis.soal', [$id, base64_encode($cekSoal->no_soal), base64_encode($cekPesertaKuis->id_peserta_kuis)]);
    }
  }
  public function step(Request $r, $id, $kondisi) {
    $di = base64_decode($id);
    $auth = Auth::guard('peserta')->user()->id_peserta;
    // session dalam bentuk encryption
    $idkursus = $r->session()->get("idkursus");
    $idsubkursus = $r->session()->get("idsubkursus");
    $idsubmenukursus = $r->session()->get("idsubmenukursus");
    $iddatatema = $r->session()->get("iddatatema");
    if ($kondisi == "intro") {
      $data = dataMenuTemaModel::where("id_data_tema", $di)->where("status_menu_tema", 0)->first();
      $data["submenu"] = dataSubMenuTemaModel::where("id_menu_tema", $data->id_menu_tema)->where("status_sub_menu_tema", 0)->first();
      $cekstep = dataStepModel::where("id_peserta", $auth)->where("id_sub_menu_tema", $data->submenu->id_sub_menu_tema)->count();
      if ($cekstep > 0) {
        return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($data->submenu->id_sub_menu_tema)]);
      } else {
        $i = new dataStepModel();
        $i->id_peserta = $auth;
        $i->id_sub_menu_tema = $data->submenu->id_sub_menu_tema;
        $i->save();
        return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($data->submenu->id_sub_menu_tema)]);
      }
    } elseif ($kondisi == "next") {
      $cekdata = dataSubMenuTemaModel::find($di);
      $kondisi = dataSubMenuTemaModel::where("id_menu_tema", $cekdata->id_menu_tema)->where("id_sub_menu_tema", ">", $di)->where("status_sub_menu_tema", 0)->first();
      #$kondisi = dataSubMenuTemaModel::where("id_menu_tema", $cekdata->id_menu_tema)->get();
      #return $kondisi;
      if (@count($kondisi) > 0) {
        $cekstep = dataStepModel::where("id_peserta", $auth)->where("id_sub_menu_tema", $kondisi->id_sub_menu_tema)->count();
        //return $di;
        if ($cekstep > 0) {
          return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($kondisi->id_sub_menu_tema)]);
        } else {
          $i = new dataStepModel();
          $i->id_peserta = $auth;
          $i->id_sub_menu_tema = $kondisi->id_sub_menu_tema;
          $i->save();
          return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($kondisi->id_sub_menu_tema)]);
        }
      } else {
        $dataMenuTema = dataMenuTemaModel::find($cekdata->id_menu_tema);
        $dataSubMenu = dataMenuTemaModel::where('id_data_tema', $dataMenuTema->id_data_tema)->where('id_menu_tema', '>', $cekdata->id_menu_tema)->where('status_menu_tema', 0)->first();
        #return $dataSubMenu;
        $data = dataSubMenuTemaModel::where("id_menu_tema", $dataSubMenu->id_menu_tema)->where("status_sub_menu_tema", 0)->first();
        if (@count($data) > 0) {
          $cekstep = dataStepModel::where("id_peserta", $auth)->where("id_sub_menu_tema", $data->id_sub_menu_tema)->count();
          if ($cekstep > 0) {
            return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($data->id_sub_menu_tema)]);
          } else {
            $i = new dataStepModel();
            $i->id_peserta = $auth;
            $i->id_sub_menu_tema = $data->id_sub_menu_tema;
            $i->save();
            return redirect()->route('other.dashboard.page.tema.ex', [$idkursus, $idsubmenukursus, $idsubmenukursus, $iddatatema, base64_encode($data->id_sub_menu_tema)]);
          }
        } else {
          return back()->with('error', 'Sudah sampai tahap akhir!');
        }
        #return $data;
      }
    }
  }
  #public function stepEx(Request $r) {}
  public function home() {
    $data = dataKursusModel::where("status_kursus", 0)->orderBy("id_kursus", "desc")->get();
    $in = 0;
    return view("pages.other.home.index", compact("data", "in"));
  }
  public function inproses() {
    $auth = Auth::guard('peserta')->user()->id_peserta;
    $data = dataPesertaKursus::orderBy("id_peserta_kursus", "desc")->where("id_peserta", $auth)->where("kondisi", "!=", 2)->get();
    $in = 1;
    foreach ($data as $key => $dat) {
      $data[$key]->subkursus = dataSubKursusModel::find($dat->id_sub_kursus);
    }
    return view("pages.other.home.inproses", compact("data", "in"));
  }
  public function complate() {
    $auth = Auth::guard('peserta')->user()->id_peserta;
    $data = dataPesertaKursus::orderBy("id_peserta_kursus", "desc")->where("id_peserta", $auth)->where("kondisi", 2)->get();
    $in = 2;
    foreach ($data as $key => $dat) {
      $data[$key]->subkursus = dataSubKursusModel::find($dat->id_sub_kursus);
    }
    return view("pages.other.home.complate", compact("data", "in"));
  }
  public function setLogout() {
    auth()->guard('peserta')->logout();
    session()->flush();

    return redirect()->route('other.login');
  }
  public function dashboard($idkursus, $idsubkursus = FALSE) {
    if ($idsubkursus == true) {
      $didsubkursus = base64_decode($idsubkursus);
      $data = dataSubKursusModel::find($didsubkursus);
    } else {
      $data = dataSubKursusModel::first();
      $idsubkursus = base64_encode($data->id_sub_kursus);
    }

    $cekdata = dataPesertaKursus::where("id_peserta", auth()->guard('peserta')->user()->id_peserta)
    ->where("id_sub_kursus", $data->id_sub_kursus)
    ->first();
    // return $data;
    if (@count($cekdata) > 0) {
      if ($cekdata->kondisi == 2) {
        return view('pages.other.dashboard.index', compact("data", "idkursus", "idsubkursus"));
      } else if ($cekdata->kondisi == 0) {
        return "bayar dulu";
      }
    } else {
      $in = new dataPesertaKursus();
      $in->id_sub_kursus = $data->id_sub_kursus;
      $in->id_peserta = auth()->guard('peserta')->user()->id_peserta;
      $in->waktu = date(now());
      $in->deadline = date("Y-m-d", strtotime('+7 days'));
      $in->kondisi = 0;
      $in->kondisi_notif = 0;
      $in->status = 0;
      $in->save();
      return redirect()->route("peserta.inproses");
    }

  }
  public function pageDashboard($idkursus, $idsubkursus, $idsubmenukursus) {
    $didsubkursus = base64_decode($idsubkursus);
    $didsubmenukursus = base64_decode($idsubmenukursus);
    $data = dataSubKursusModel::find($didsubkursus);
    $kondisi = dataSubMenuKursusModel::find($didsubmenukursus);
    // return $kondisi;
    if ($kondisi->kondisi_sub_menu_kursus == 0) {
      // text
      $skondisi = 0;
      $dataSubMenu = dataTextKursusModel::where("id_sub_menu_kursus", $kondisi->id_sub_menu_kursus)->first();
    } else if ($kondisi->kondisi_sub_menu_kursus == 1) {
      // Themes
      $skondisi = 1;
      $dataSubMenu = dataTemaKursusModel::where("id_sub_menu_kursus", $kondisi->id_sub_menu_kursus)->orderBy("id_data_tema", "desc")->get();
      foreach ($dataSubMenu as $key => $dat) {
        $dataSubMenu[$key]->count = dataMenuTemaModel::where("id_data_tema", $dat->id_data_tema)->count();
      }
    } else if ($kondisi->kondisi_sub_menu_kursus == 2) {
      // Forum
      $skondisi = 2;
      $dataSubMenu = dataForumKursusModel::where("id_sub_menu_kursus", $kondisi->id_sub_menu_kursus)->first();
    } else if ($kondisi->kondisi_sub_menu_kursus == 3) {
      // Message
      $skondisi = 3;
      $dataSubMenu = dataMessageKursusModel::where("id_sub_menu_kursus", $kondisi->id_sub_menu_kursus)->first();
    } else if ($kondisi->kondisi_sub_menu_kursus == 4) {
      // Ratings
      $skondisi = 4;
      $dataSubMenu = dataRetingsKursusModel::where("id_sub_menu_kursus", $kondisi->id_sub_menu_kursus)->first();
    } else if ($kondisi->kondisi_sub_menu_kursus == 5) {
      // File
      $skondisi = 5;
      $dataSubMenu = [];
    } else if ($kondisi->kondisi_sub_menu_kursus == 6) {
      // File
      $skondisi = 6;
      $dataSubMenu = [];
    }
    return view('pages.other.dashboard.page', compact("data", "idkursus", "idsubkursus", "idsubmenukursus", "skondisi", "dataSubMenu"));
  }
  public function pageTema(Request $r, $idkursus, $idsubkursus, $idsubmenukursus, $iddatatema) {
    $didsubkursus = base64_decode($idsubkursus);
    $didsubmenukursus = base64_decode($idsubmenukursus);
    $diddatatema = base64_decode($iddatatema);
    $data = dataTemaKursusModel::find($diddatatema);
    $submenukursus = dataSubMenuKursusModel::find($data->id_sub_menu_kursus);
    $menukursus = dataMenuKursusModel::find($submenukursus->id_menu_kursus);
    $subkursus = dataSubKursusModel::find($menukursus->id_sub_kursus);
    $kursus = dataKursusModel::find($subkursus->id_kursus, ["image"]);
    $data["kursus"] = $kursus;
    $data["subkursus"] = $subkursus;

    $r->session()->put("idkursus", $idkursus);
    $r->session()->put("idsubkursus", $idsubkursus);
    $r->session()->put("idsubmenukursus", $idsubmenukursus);
    $r->session()->put("iddatatema", $iddatatema);
    // $kondisi = dataMenuTemaModel::find($diddatatema);

    $kondisi = 0;
    //       $cekstep = dataStepModel::
    //      return $next;
    return view('pages.other.dashboard.tema.page', compact("diddatatema", "kondisi", "data", "idkursus", "idsubkursus", "idsubmenukursus"));
  }
  public function pageTemaEx(Request $r, $idkursus, $idsubkursus, $idsubmenukursus, $iddatatema, $idsubmenutema) {
    $auth = Auth::guard('peserta')->user()->id_peserta;

    // session dalam bentuk encryption
    $idkursus = $r->session()->get("idkursus");
    $idsubkursus = $r->session()->get("idsubkursus");
    $idsubmenukursus = $r->session()->get("idsubmenukursus");
    $iddatatema = $r->session()->get("iddatatema");
    // $kondisi = dataMenuTemaModel::find($diddatatema);

    // session dalam bentuk asli

    $diddatatema = base64_decode($iddatatema);
    $didsubmenutema = base64_decode($idsubmenutema);
    $data = dataSubMenuTemaModel::find($didsubmenutema);
    $data_id = $data->id_sub_menu_tema;

    if ($data->kondisi_sub_menu_tema == 0) {
      // video
      $skondisi = 0;
      $data->sub = dataVideosModel::where("id_sub_menu_tema", $data_id)->first();
    } else if ($data->kondisi_sub_menu_tema == 1) {
      // audio
      $skondisi = 1;
      $data->sub = dataAudiosModel::where("id_sub_menu_tema", $data_id)->first();
    } else if ($data->kondisi_sub_menu_tema == 2) {
      // reading
      $skondisi = 2;
      $data->sub = dataReadingsModel::where("id_sub_menu_tema", $data_id)->where("status_readings", 0)->first();
    } else if ($data->kondisi_sub_menu_tema == 3) {
      // kuis
      $skondisi = 3;
      $data->sub = dataKuisModel::where("id_sub_menu_tema", $data_id)->where("status_kuis", 0)->first();
    }
    // return $data;
    $kondisi = 1;

    #$cekstep = dataSubMenuTemaModel::find($didsubmenutema);
    #$step = dataSubMenuTemaModel::where("id_menu_tema", $cekstep->id_menu_tema)->where("id_sub_menu_tema", ">", $didsubmenutema)->where("status_sub_menu_tema", 1)->first();
    #return $step;
    return view('pages.other.dashboard.tema.page', compact("diddatatema", "data", "didsubmenutema", "kondisi", "skondisi", "idkursus", "idsubkursus", "idsubmenukursus"));
  }

  public function pagePayment(Request $r, $idpesertakusus) {
    $didpesertakursus = base64_decode($idpesertakusus);
    $data = dataPesertaKursus::find($didpesertakursus);
    $in = 1;
    $data->subkursus = dataSubKursusModel::find($data->id_sub_kursus);
    return view('pages.other.home.payment', compact("in", "data"));
  }
  public function postPayment(Request $r, $idpesertakusus) {
    $didpesertakursus = base64_decode($idpesertakusus);
    $file = $r->file('bukti_pembayaran');
    $nama_file = rand().".".$file->getClientOriginalExtension();
    // return $nama_file;
    $data = dataPesertaKursus::find($didpesertakursus);
    $data->bukti_pembayaran = $nama_file;
    $data->tgl_pembayaran = date(now());
    $data->kondisi = 1;
    $data->update();
    if ($data) {
      $file->move('kursus/buktiPembayaran/', $nama_file);
    }
    $in = 1;
    $data->subkursus = dataSubKursusModel::find($data->id_sub_kursus);
    return back();
  }

}