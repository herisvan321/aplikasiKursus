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
use Response;
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

class mentorKursusController extends Controller
{
  public function __construct() {
    $this->middleware('auth:mentor')->except('setLogout');
  }
  public function editSoal(Request $r, $id) {
    $did = base64_decode($id);
    $in = 0;
    $data = dataSoalModel::find($did);
    return view("pages.mentor.kursus.views.soal.edit", compact("data", "in", "id"));
  }
  public function showSoal(Request $r, $id) {
    $did = base64_decode($id);
    $in = 0;
    $data = dataSoalModel::find($did);
    return view("pages.mentor.kursus.views.soal.show", compact("data", "in", "id"));
  }
  public function updateSoal(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = dataSoalModel::find($data_id);
    $i->no_soal = $r->no_soal;
    $i->content = $r->content;
    $i->skor_soal = $r->skor_soal;
    $i->status_soal = $r->status_soal;
    $i->update();
    if ($i) {
      return redirect()->route("mentor.kursus.views.kuis.soal", [base64_encode($i->id_kuis)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveSoal(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataSoalModel();
    $i->id_kuis = $data_id;
    $i->no_soal = $r->no_soal;
    if (!empty($r->file('media_soal'))) {
      $Value = $r->file('media_soal');
      $getFileExt = $Value->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/soal/');
      $i->media_soal = $uploadedFile;
      if (
        $getFileExt == "mp4" ||
        $getFileExt == "avi" ||
        $getFileExt == "mkv" ||
        $getFileExt == "3gp" ||
        $getFileExt == "dat" ||
        $getFileExt == "mpg" ||
        $getFileExt == "gifv" ||
        $getFileExt == "wmv" ||
        $getFileExt == "flv" ||
        $getFileExt == "webm"
      ) {
        $typemedia = "video";
      } elseif (
        $getFileExt == "wav" ||
        $getFileExt == "wma" ||
        $getFileExt == "pcm" ||
        $getFileExt == "aiff" ||
        $getFileExt == "aac" ||
        $getFileExt == "ogg" ||
        $getFileExt == "flac" ||
        $getFileExt == "alac" ||
        $getFileExt == "midi" ||
        $getFileExt == "mp3"
      ) {
        $typemedia = "audio";
      } else {
        return redirect()->back()->with('error', 'Format media tidak didukung!');
      }
      $i->type_media = $typemedia;
    }

    $i->jml_jawaban = $r->jml_jawaban;
    $i->jawaban = $r->jawaban;
    $i->content = $r->content;
    $i->skor_soal = $r->skor_soal;
    $i->status_soal = 0;
    $i->save();
    if ($i) {
      if (!empty($r->file('media_soal'))) {
        $Value->move($uploadDir, $uploadedFile);
      }
      return redirect()->route("mentor.kursus.views.kuis.soal", [$id])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function soalInput(Request $r, $id) {
    $did = base64_decode($id);
    $in = 0;
    //$data = dataSoalModel::where("id_kuis", $did)->orderBy("no_soal", "desc")->get();
    $data = [];
    //return $data;
    /*foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }*/
    return view("pages.mentor.kursus.views.soal.input", compact("data", "in", "id"));
  }
  public function soalIndex(Request $r, $id) {
    $did = base64_decode($id);
    $in = 0;
    $data = dataSoalModel::where("id_kuis", $did)->orderBy("no_soal", "desc")->get();
    //return $data;
    /*foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }*/
    return view("pages.mentor.kursus.views.soal.index", compact("data", "in", "id"));
  }
  public function saveReadings(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataReadingsModel();
    $i->id_sub_menu_tema = $data_id;
    $i->kondisi_readings = $r->kondisi;
    if ($r->kondisi == 0) {
      $i->file_reading = $r->file;
    } elseif ($r->kondisi == 1) {
      $Value = $r->file('file');
      $getFileExt = $Value->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/readings/');
      $i->file_reading = $uploadedFile;
    }
    $i->type_readings = 0;
    $i->content = $r->content;
    $i->status_readings = 0;
    $i->save();
    if ($i) {
      if ($r->kondisi == 1) {
        $Value->move($uploadDir, $uploadedFile);
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveAudios(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataAudiosModel();
    $i->id_sub_menu_tema = $data_id;
    $i->kondisi_audios = $r->kondisi;
    if ($r->kondisi == 0) {
      $i->file_audio = $r->file;
    } elseif ($r->kondisi == 1) {
      $Value = $r->file('file');
      $getFileExt = $Value->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/audios/');
      $i->file_audio = $uploadedFile;
    }
    $i->content = $r->content;
    $i->status_audio = 0;
    $i->save();
    if ($i) {
      if ($r->kondisi == 1) {
        $Value->move($uploadDir, $uploadedFile);
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateReadings(Request $r, $id) {
    //  return $r->all();
    $data_id = base64_decode($id);
    $i = dataReadingsModel::find($data_id);
    $i->kondisi_readings = $r->kondisi;
    if ($r->kondisi == 0) {
      if (!empty($r->file)) {
        $target = "assets/dist/readings/".$i->file_reading;
        if (file_exists($target)) {
          unlink($target);
        }
        $i->file_reading = $r->file;
      }
    } elseif ($r->kondisi == 1) {
      if (!empty($r->file)) {
        $target = "assets/dist/readings/".$i->file_reading;
        if (file_exists($target)) {
          unlink($target);
        }
        $Value = $r->file('file');
        $getFileExt = $Value->getClientOriginalExtension();
        $uploadedFile = time() . '.' . $getFileExt;
        $uploadDir = public_path('assets/dist/readings/');
        $i->file_reading = $uploadedFile;
      }
    }

    $i->content = $r->content;
    $i->status_readings = $r->status_readings;
    $i->update();
    if ($i) {
      if ($r->kondisi == 1) {
        if (!empty($r->file)) {
          $Value->move($uploadDir, $uploadedFile);
        }
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function downloadReadings(Request $r, $id) {
    //  return $r->all();
    $data_id = base64_decode($id);
    $i = dataReadingsModel::find($data_id);

    $target = "assets/dist/readings/".$i->file_reading;
    return Response::download($target);
  }
  public function updateAudios(Request $r, $id) {
    //  return $r->all();
    $data_id = base64_decode($id);
    $i = dataAudiosModel::find($data_id);
    $i->kondisi_audios = $r->kondisi;
    if ($r->kondisi == 0) {
      if (!empty($r->file)) {
        $target = "assets/dist/audios/".$i->file_audio;
        if (file_exists($target)) {
          unlink($target);
        }
        $i->file_audio = $r->file;
      }
    } elseif ($r->kondisi == 1) {
      if (!empty($r->file)) {
        $target = "assets/dist/audios/".$i->file_audio;
        if (file_exists($target)) {
          unlink($target);
        }
        $Value = $r->file('file');
        $getFileExt = $Value->getClientOriginalExtension();
        $uploadedFile = time() . '.' . $getFileExt;
        $uploadDir = public_path('assets/dist/audios/');
        $i->file_audio = $uploadedFile;
      }
    }

    $i->content = $r->content;
    $i->status_audio = $r->status_audio;
    $i->update();
    if ($i) {
      if ($r->kondisi == 1) {
        if (!empty($r->file)) {
          $Value->move($uploadDir, $uploadedFile);
        }
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateVideos(Request $r, $id) {
    //  return $r->all();
    $data_id = base64_decode($id);
    $i = dataVideosModel::find($data_id);
    $i->kondisi_videos = $r->kondisi;
    if ($r->kondisi == 0) {
      if (!empty($r->file)) {
        $target = "assets/dist/videos/".$i->file_video;
        if (file_exists($target)) {
          unlink($target);
        }
        $i->file_video = $r->file;
      }
    } elseif ($r->kondisi == 1) {
      if (!empty($r->file)) {
        $target = "assets/dist/videos/".$i->file_video;
        if (file_exists($target)) {
          unlink($target);
        }
        $Value = $r->file('file');
        $getFileExt = $Value->getClientOriginalExtension();
        $uploadedFile = time() . '.' . $getFileExt;
        $uploadDir = public_path('assets/dist/videos/');
        $i->file_video = $uploadedFile;
      }
    }

    $i->content = $r->content;
    $i->status_video = $r->status_video;
    $i->update();
    if ($i) {
      if ($r->kondisi == 1) {
        if (!empty($r->file)) {
          $Value->move($uploadDir, $uploadedFile);
        }
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveVideos(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataVideosModel();
    $i->id_sub_menu_tema = $data_id;
    $i->kondisi_videos = $r->kondisi;
    if ($r->kondisi == 0) {
      $i->file_video = $r->file;
    } elseif ($r->kondisi == 1) {
      $Value = $r->file('file');
      $getFileExt = $Value->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/videos/');
      $i->file_video = $uploadedFile;
    }

    $i->content = $r->content;
    $i->status_video = 0;
    $i->save();
    if ($i) {
      if ($r->kondisi == 1) {
        $Value->move($uploadDir, $uploadedFile);
      }
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveRatings(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataRetingsKursusModel();
    $i->id_sub_menu_kursus = $data_id;
    $i->status_data_rating = 1;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateRatings(Request $r, $id) {
    // return $id;
    $data_id = base64_decode($id);
    $i = dataRetingsKursusModel::find($data_id);
    if ($i->status_data_rating == 0) {
      $status = 1;
    } else {
      $status = 0;
    }
    $i->status_data_rating = $status;
    $i->update();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateSubMenuKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    //return $data_id;
    $r->validate([
      'judul' => 'required',
      'status_sub_menu_kursus' => 'required',
    ]);
    $i = dataSubMenuKursusModel::find($data_id);
    $i->judul_sub_menu_kursus = $r->judul;
    $i->status_sub_menu_kursus = $r->status_sub_menu_kursus;
    $i->update();
    if ($i) {
      return redirect()->route("mentor.kursus.menu", [base64_encode($i->id_menu_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function editSubMenuKursus($id, $ids) {
    $data_id = base64_decode($id);
    $data_ids = base64_decode($ids);
    $id1 = $id;
    // return $data_id;
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $kondisi = 0;
    $data = dataSubMenuKursusModel::where("id_menu_kursus", $data_ids)->orderBy("id_sub_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $count = dataTemaKursusModel::where("id_sub_menu_kursus", $dat->id_sub_menu_kursus)->count();
      $data[$key]->count = $count;
      if ($count > 0) {
        $kondisi = 1;
      }
    }
    $edit = dataSubMenuKursusModel::find($data_id);
    // return $edit;
    $ido = $id;
    $id = $ids;
    $in = 0;
    //return $data;
    return view("pages.mentor.kursus.submenu.edit", compact("kondisi", "edit", "id", "id1", "ido", "data", "kOpen", "kActive", "in"));
  }
  public function editMenuSubKursus($id, $ids) {
    $data_id = base64_decode($id);
    $data_ids = base64_decode($ids);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $in = 0;
    $data = dataMenuSubKursusModel::where("id_sub_kursus", $data_ids)->orderBy("id_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }

    $edit = dataMenuSubKursusModel::find($data_id);
    $ido = $id;
    $id1 = $id;
    $id = $ids;
    // return $edit;
    return view("pages.mentor.kursus.menu.edit", compact("edit", "id", "ido", "id1", "data", "kOpen", "kActive", "in"));
  }
  public function updateMenuSubKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    // return $data_id;
    $r->validate([
      'judul' => 'required',
      'status_menu_kursus' => 'required',
    ]);
    $i = dataMenuSubKursusModel::find($data_id);
    $i->judul_menu_kursus = $r->judul;
    $i->status_menu_kursus = $r->status_menu_kursus;
    $i->update();
    if ($i) {
      return redirect()->route("mentor.home.menuKursus", [base64_encode($i->id_sub_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveTema(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
    ]);
    $i = new dataTemaKursusModel();
    $i->id_sub_menu_kursus = $data_id;
    $i->judul_data_tema = $r->judul;
    $i->status_data_tema = 0;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateTema(Request $r, $id) {
    //return $id;
    $r->validate([
      'judul' => 'required',
    ]);
    $data_id = base64_decode($id);
    $i = dataTemaKursusModel::find($data_id);
    $i->judul_data_tema = $r->judul;
    $i->status_data_tema = $r->status_tema;
    $i->update();

    if ($i) {
      return redirect()->route("mentor.kursus.views", [base64_encode($i->id_sub_menu_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveMessage(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataMessageKursusModel();
    $i->id_sub_menu_kursus = $data_id;
    $i->status_data_message = 1;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateMessage(Request $r, $id) {
    // return $id;
    $data_id = base64_decode($id);
    $i = dataMessageKursusModel::find($data_id);
    if ($i->status_data_message == 0) {
      $status = 1;
    } else {
      $status = 0;
    }
    $i->status_data_message = $status;
    $i->update();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveForum(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
    ]);
    $i = new dataForumKursusModel();
    $i->id_sub_menu_kursus = $data_id;
    $i->deskripsi = $r->deskrisi;
    $i->judul_forum = $r->judul;
    $i->status_forum = 0;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateForum(Request $r, $id) {
    // return $id;
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
    ]);
    $data_id = base64_decode($id);
    $i = dataForumKursusModel::find($data_id);
    $i->deskripsi = $r->deskripsi;
    $i->judul_forum = $r->judul;
    $i->status_forum = $r->status_forum;
    $i->update();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveText(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'content' => 'required',
      'file' => 'required'
    ]);
    $i = new dataTextKursusModel();
    $i->judul_data_text = $r->judul;
    $i->id_sub_menu_kursus = $data_id;
    $i->content = $r->content;
    $Value = $r->file('file');
    $getFileExt = $Value->getClientOriginalExtension();
    $uploadedFile = time() . '.' . $getFileExt;
    $uploadDir = public_path('assets/dist/file/');
    $Value->move($uploadDir, $uploadedFile);
    $i->data_file = $uploadedFile;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateText(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'content' => 'required',
    ]);
    $i = dataTextKursusModel::find($data_id);
    $i->judul_data_text = $r->judul;
    $i->content = $r->content;
    if ($r->file('file') != "") {
      $target = "assets/dist/file/".$i->data_file;
      if (file_exists($target)) {
        unlink($target);
      }
      $Value = $r->file('file');
      $getFileExt = $Value->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/file/');
      $Value->move($uploadDir, $uploadedFile);
      $i->data_file = $uploadedFile;
    }
    $i->update();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function downloadText(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = dataTextKursusModel::find($data_id);
    return response()->download("assets/dist/file/".$i->data_file);
  }
  public function saveSubMenuTema(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataSubMenuTemaModel();
    $i->id_menu_tema = $data_id;
    $i->judul_sub_menu_tema = $r->judul;
    $i->menit = $r->menit;
    $i->status_sub_menu_tema = 1;
    $i->kondisi_sub_menu_tema = $r->kondisi;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateSubMenuTema(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = dataSubMenuTemaModel::find($data_id);
    $i->judul_sub_menu_tema = $r->judul;
    $i->status_sub_menu_tema = $r->status_sub_menu_tema;
    $i->update();

    if ($i) {
      return redirect()->route("mentor.kursus.views.sub-menu-tema", [base64_encode($i->id_menu_tema)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveKuis(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataKuisModel();
    $i->id_sub_menu_tema = $data_id;
    $i->judul_kuis = $r->judul;
    $i->deskripsi = $r->deskripsi;
    $i->waktu = $r->menit;
    $i->status_kuis = 0;
    $i->save();
    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateKuis(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = dataKuisModel::find($data_id);
    $i->judul_kuis = $r->judul;
    $i->status_kuis = $r->status_kuis;
    $i->update();
    if ($i) {
      return redirect()->route("mentor.kursus.views.sub-menu-tema.content", [base64_encode($i->id_sub_menu_tema)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveMenuTema(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataMenuTemaModel();
    $i->id_data_tema = $data_id;
    $i->judul_menu_tema = $r->judul;
    $i->status_menu_tema = 1;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateMenuTema(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = dataMenuTemaModel::find($data_id);
    $i->judul_menu_tema = $r->judul;
    $i->status_menu_tema = $r->status_menu_tema;
    $i->update();

    if ($i) {
      return redirect()->route("mentor.kursus.views.menu-tema", [base64_encode($i->id_data_tema)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveSubMenuKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'kondisi_sub_menu_kursus' => 'required',
    ]);
    $i = new dataSubMenuKursusModel();
    $i->judul_sub_menu_kursus = $r->judul;
    $i->id_menu_kursus = $data_id;
    $i->status_sub_menu_kursus = 0;
    $i->kondisi_sub_menu_kursus = $r->kondisi_sub_menu_kursus;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveSubKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required'
    ]);
    $i = new dataSubKursusModel();
    $i->judul_sub_kursus = $r->judul;
    $i->id_kursus = $data_id;
    $i->deskripsi = $r->deskripsi;
    $i->status_sub_kursus = 0;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function saveMenuSubKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required'
    ]);
    $i = new dataMenuSubKursusModel();
    $i->judul_menu_kursus = $r->judul;
    $i->id_sub_kursus = $data_id;
    $i->status_menu_kursus = 0;
    $i->save();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function menuKursus($id1) {
    $did = base64_decode($id1);
    $in = 0;
    $data = dataMenuSubKursusModel::where("id_sub_kursus", $did)->orderBy("id_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }
    return view("pages.mentor.kursus.menu.input", compact("data", "in", "id1"));
  }
  public function addSubMenuKursus($id) {
    $in = 0;
    $kondisi = 0;
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataSubMenuKursusModel::where("id_menu_kursus", $data_id)->orderBy("id_sub_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $count = dataTemaKursusModel::where("id_sub_menu_kursus", $dat->id_sub_menu_kursus)->count();
      $data[$key]->count = $count;
      if ($count > 0) {
        $kondisi = 1;
      }
    }
    // return $data;
    return view("pages.mentor.kursus.submenu.input", compact("kondisi", "id", "data", "kOpen", "in", "kActive"));
  }
  public function viewsKursus($id) {
    $in = 0;
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $kodisi = dataSubMenuKursusModel::find($data_id);
    if ($kodisi->kondisi_sub_menu_kursus == 0) {
      // text
      $skondisi = 0;
      $data = dataTextKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 1) {
      // Themes
      $skondisi = 1;
      $data = dataTemaKursusModel::where("id_sub_menu_kursus", $data_id)->orderBy("id_data_tema", "desc")->get();
      foreach ($data as $key => $dat) {
        $data[$key]->count = dataMenuTemaModel::where("id_data_tema", $dat->id_data_tema)->count();
      }
    } else if ($kodisi->kondisi_sub_menu_kursus == 2) {
      // Forum
      $skondisi = 2;
      $data = dataForumKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 3) {
      // Message
      $skondisi = 3;
      $data = dataMessageKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 4) {
      // Ratings
      $skondisi = 4;
      $data = dataRetingsKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 5) {
      // File
      $skondisi = 5;
    } else if ($kodisi->kondisi_sub_menu_kursus == 6) {
      // File
      $skondisi = 6;
    }
    // return $data;
    $kondisis = 0;
    return view("pages.mentor.kursus.views.index", compact("id", "data", "skondisi", "kOpen", "kActive", "in", "kondisis"));
  }
  public function viewsEditKursus($id, $idedit) {
    $in = 0;
    $data_id = base64_decode($id);
    $edit_id = base64_decode($idedit);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $kodisi = dataSubMenuKursusModel::find($data_id);
    if ($kodisi->kondisi_sub_menu_kursus == 0) {
      // text
      $skondisi = 0;
      $data = dataTextKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 1) {
      // Themes
      $skondisi = 1;
      $edit = dataTemaKursusModel::find($edit_id);
      //return $edit;
      $data = dataTemaKursusModel::where("id_sub_menu_kursus", $data_id)->orderBy("id_data_tema", "desc")->get();
      foreach ($data as $key => $dat) {
        $data[$key]->count = dataMenuTemaModel::where("id_data_tema", $dat->id_data_tema)->count();
      }
    } else if ($kodisi->kondisi_sub_menu_kursus == 2) {
      // Forum
      $skondisi = 2;
      $data = dataForumKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 3) {
      // Message
      $skondisi = 3;
      $data = dataMessageKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 4) {
      // Ratings
      $skondisi = 4;
      $data = dataRetingsKursusModel::where("id_sub_menu_kursus", $data_id)->first();
    } else if ($kodisi->kondisi_sub_menu_kursus == 5) {
      // File
      $skondisi = 5;
    } else if ($kodisi->kondisi_sub_menu_kursus == 6) {
      // File
      $skondisi = 6;
    }
    // return $data;
    $kondisis = 1;
    return view("pages.mentor.kursus.views.index", compact("id", "idedit", "data", "skondisi", "kOpen", "kActive", "in", "kondisis", "edit"));
  }
  public function getMenuTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $in = 0;
    $kActive = "kursus-buat";
    $data = dataMenuTemaModel::where("id_data_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->count = dataSubMenuTemaModel::where("id_menu_tema", $dat->id_menu_tema)->count();
    }
    return view("pages.mentor.kursus.views.menutema.index", compact("data", "id", "kOpen", "in", "kActive"));
  }
  public function editMenuTema($id, $idedit) {
    $data_id = base64_decode($id);
    $edit_id = base64_decode($idedit);
    $kOpen = "kursus";
    $in = 0;
    $kActive = "kursus-buat";
    $data = dataMenuTemaModel::where("id_data_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    $edit = dataMenuTemaModel::find($edit_id);
    foreach ($data as $key => $dat) {
      $data[$key]->count = dataSubMenuTemaModel::where("id_menu_tema", $dat->id_menu_tema)->count();
    }
    return view("pages.mentor.kursus.views.menutema.edit", compact("data", "id", "kOpen", "in", "kActive", "edit"));
  }
  public function getSubMenuTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    $in = 0;
    $data = dataSubMenuTemaModel::where("id_menu_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    // return $data;
    foreach ($data as $key => $dat) {
      if ($dat->kondisi_sub_menu_tema == 0) {
        $data[$key]->count = dataVideosModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 1) {
        $data[$key]->count = dataAudiosModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 2) {
        $data[$key]->count = dataReadingsModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 3) {
        $data[$key]->count = dataKuisModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      }

    }
    return view("pages.mentor.kursus.views.submenutema.index", compact("data", "id", "kOpen", "in", "kActive"));
  }
  public function editSubMenuTema($id, $idedit) {
    $data_id = base64_decode($id);
    $edit_id = base64_decode($idedit);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    $in = 0;
    $edit = dataSubMenuTemaModel::find($edit_id);
    $data = dataSubMenuTemaModel::where("id_menu_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    // return $data;
    foreach ($data as $key => $dat) {
      if ($dat->kondisi_sub_menu_tema == 0) {
        $data[$key]->count = dataVideosModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 1) {
        $data[$key]->count = dataAudiosModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 2) {
        $data[$key]->count = dataReadingsModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      } elseif ($dat->kondisi_sub_menu_tema == 3) {
        $data[$key]->count = dataKuisModel::where("id_sub_menu_tema", $dat->id_sub_menu_tema)->count();
      }

    }
    return view("pages.mentor.kursus.views.submenutema.edit", compact("data", "id", "kOpen", "in", "kActive", "edit"));
  }
  public function getContentTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    $in = 0;
    $cekSubMenuTema = dataSubMenuTemaModel::find($data_id);
    if ($cekSubMenuTema->kondisi_sub_menu_tema == 0) {
      $skondisi = 0;
      $data = dataVideosModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 1) {
      $skondisi = 1;
      $data = dataAudiosModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 2) {
      $skondisi = 2;
      $data = dataReadingsModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 3) {
      $skondisi = 3;
      $data = dataKuisModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->orderBy("id_kuis", "desc")->get();
      foreach ($data as $key => $dat) {
        $data[$key]->count = dataSoalModel::where("id_kuis", $dat->id_kuis)->count();
      }
    }
    // $data = dataSubMenuTemaModel::where("id_menu_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    // // return $data;
    // foreach($data as $key => $dat){
    //     // $data[$key]->count = dataSubMenuTemaModel::where("id_menu_tema", $dat->id_menu_tema)->count();
    // }
    //return $data;
    $kondisi = 0;
    return view("pages.mentor.kursus.views.submenutema.content", compact("data", "id", "kOpen", "kActive", "skondisi", "in", "kondisi"));
  }
  public function editContentTema($id, $idedit) {
    $data_id = base64_decode($id);
    $edit_id = base64_decode($idedit);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    $in = 0;
    $cekSubMenuTema = dataSubMenuTemaModel::find($data_id);
    if ($cekSubMenuTema->kondisi_sub_menu_tema == 0) {
      $skondisi = 0;
      $data = dataVideosModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 1) {
      $skondisi = 1;
      $data = dataAudiosModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 2) {
      $skondisi = 2;
      $data = dataReadingsModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->first();
    } elseif ($cekSubMenuTema->kondisi_sub_menu_tema == 3) {
      $skondisi = 3;
      $data = dataKuisModel::where("id_sub_menu_tema", $cekSubMenuTema->id_sub_menu_tema)->orderBy("id_kuis", "desc")->get();
      $edit = dataKuisModel::find($edit_id);
      //return $edit;
      foreach ($data as $key => $dat) {
        $data[$key]->count = dataSoalModel::where("id_kuis", $dat->id_kuis)->count();
      }
    }
    // $data = dataSubMenuTemaModel::where("id_menu_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    // // return $data;
    // foreach($data as $key => $dat){
    //     // $data[$key]->count = dataSubMenuTemaModel::where("id_menu_tema", $dat->id_menu_tema)->count();
    // }
    $kondisi = 1;
    return view("pages.mentor.kursus.views.submenutema.content", compact("data", "id", "kOpen", "kActive", "skondisi", "in", "kondisi", "edit", "idedit"));
  }
}