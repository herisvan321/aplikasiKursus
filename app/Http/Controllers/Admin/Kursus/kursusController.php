<?php

namespace App\Http\Controllers\Admin\Kursus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\dataKursusModel;
use App\dataSubKursusModel;
use App\dataMenuSubKursusModel;
use App\dataSubMenuKursusModel;
use App\dataTextKursusModel;
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
use Response;

class kursusController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
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
  public function saveVideos(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataVideosModel();
    $i->id_sub_menu_tema = $data_id;
    $i->kondisi_videos = $r->kondisi;
    $i->file_video = $r->file;
    $i->content = $r->content;
    $i->status_video = 0;
    $i->save();
    if ($i) {
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
    $i->file_audio = $r->file;
    $i->content = $r->content;
    $i->status_audio = 0;
    $i->save();
    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function savaReading(Request $r, $id) {
    $data_id = base64_decode($id);
    $i = new dataReadingsModel();
    $i->id_sub_menu_tema = $data_id;
    $i->type_readings = $r->type;
    $i->kondisi_readings = $r->kondisi;
    $i->file_reading = $r->file;
    $i->content = $r->content;
    $i->status_reading = 0;
    $i->save();
    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function getContentTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
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
    return view("pages.admin.kursus.views.submenutema.content", compact("data", "id", "kOpen", "kActive", "skondisi"));
  }
  public function getSubMenuTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
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
    return view("pages.admin.kursus.views.submenutema.index", compact("data", "id", "kOpen", "kActive"));
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
  public function getMenuTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    $data = dataMenuTemaModel::where("id_data_tema", $data_id)->orderBy("id_menu_tema", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->count = dataSubMenuTemaModel::where("id_menu_tema", $dat->id_menu_tema)->count();
    }
    return view("pages.admin.kursus.views.menutema.index", compact("data", "id", "kOpen", "kActive"));
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
  public function buatKursus() {
    $kOpen = "kursus";
    $kActive = "kursus-buat";
    return view("pages.admin.kursus.buat.index", compact("kOpen", "kActive"));
  }

  public function saveKursus(Request $r) {
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
      'introduction' => 'required',
      'ellgibilitty' => 'required',
      'image' => 'required'
    ]);
    $i = new dataKursusModel();
    $i->judul = $r->judul;
    $i->deskripsi = $r->deskripsi;
    $i->introduction = $r->introduction;
    $i->ellgibilitty = $r->ellgibilitty;
    $ImgValue = $r->file('image');
    $getFileExt = $ImgValue->getClientOriginalExtension();
    $uploadedFile = time() . '.' . $getFileExt;
    $uploadDir = public_path('assets/dist/img/');
    $i->image = $uploadedFile;
    $i->status_kursus = 0;
    $i->save();
    $ImgValue->move($uploadDir, $uploadedFile);

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
    // return $id;
    $r->validate([
      'judul' => 'required',
    ]);
    $data_id = base64_decode($id);
    $i = dataTemaKursusModel::find($data_id);
    $i->judul_data_tema = $r->judul;
    $i->status_data_tema = $r->status_temaa;
    $i->update();

    if ($i) {
      return redirect()->back()->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function editTema($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $edit = dataTemaKursusModel::find($data_id);
    $data = dataTemaKursusModel::where("id_sub_menu_kursus", $edit->id_sub_menu_kursus)->orderBy("id_data_tema", "desc")->get();
    // return $edit;
    return view("pages.admin.kursus.sub.edit", compact("edit", "id", "data", "kOpen", "kActive"));
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
  public function updateSubKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
      'status_sub_kursus' => 'required',
    ]);
    $i = dataSubKursusModel::find($data_id);
    $i->judul_sub_kursus = $r->judul;
    $i->deskripsi = $r->deskripsi;
    $i->status_sub_kursus = $r->status_sub_kursus;
    $i->update();

    if ($i) {
      return redirect()->route("kursus.sub.add", [base64_encode($i->id_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
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
      return redirect()->route("kursus.sub.add.menu", [base64_encode($i->id_sub_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function updateSubMenuKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    // return $data_id;
    $r->validate([
      'judul' => 'required',
      'status_sub_menu_kursus' => 'required',
    ]);
    $i = dataSubMenuKursusModel::find($data_id);
    $i->judul_sub_menu_kursus = $r->judul;
    $i->status_sub_menu_kursus = $r->status_sub_menu_kursus;
    $i->update();
    if ($i) {
      return redirect()->route("kursus.menu", [base64_encode($i->id_menu_kursus)])->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }
  public function addSubKursus($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataSubKursusModel::orderBy("id_sub_kursus", "desc")->where("id_kursus", $data_id)->get();
    foreach ($data as $key => $dat) {
      $data[$key]->jml_menu = dataMenuSubKursusModel::where("id_sub_kursus", $dat->id_sub_kursus)->count();
    }
    return view("pages.admin.kursus.sub.input", compact("id", "data", "kOpen", "kActive"));
  }
  public function viewsKursus($id) {
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
    return view("pages.admin.kursus.views.index", compact("id", "data", "skondisi", "kOpen", "kActive"));
  }
  public function addMenuSubKursus($id) {
    $data_id = base64_decode($id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataMenuSubKursusModel::where("id_sub_kursus", $data_id)->orderBy("id_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }
    return view("pages.admin.kursus.menu.input", compact("id", "data", "kOpen", "kActive"));
  }
  public function addSubMenuKursus($id) {
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
    return view("pages.admin.kursus.submenu.input", compact("kondisi", "id", "data", "kOpen", "kActive"));
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
  public function editSubKursus($id, $ids) {
    $data_id = base64_decode($id);
    $data_ids = base64_decode($ids);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataSubKursusModel::where("id_kursus", $data_ids)->orderBy("id_sub_kursus", "desc")->get();
    $edit = dataSubKursusModel::find($data_id);
    $id = $ids;
    // return $edit;
    return view("pages.admin.kursus.sub.edit", compact("edit", "id", "data", "kOpen", "kActive"));
  }
  public function editMenuSubKursus($id, $ids) {
    $data_id = base64_decode($id);
    $data_ids = base64_decode($ids);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataMenuSubKursusModel::where("id_sub_kursus", $data_ids)->orderBy("id_menu_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->jml_sub = dataSubMenuKursusModel::where("id_menu_kursus", $dat->id_menu_kursus)->count();
    }

    $edit = dataMenuSubKursusModel::find($data_id);
    $ido = $id;
    $id = $ids;
    // return $edit;
    return view("pages.admin.kursus.menu.edit", compact("edit", "id", "ido", "data", "kOpen", "kActive"));
  }
  public function editSubMenuKursus($id, $ids) {
    $data_id = base64_decode($id);
    $data_ids = base64_decode($ids);
    // return $data_id;
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataSubMenuKursusModel::where("id_menu_kursus", $data_ids)->orderBy("id_sub_menu_kursus", "desc")->get();
    $edit = dataSubMenuKursusModel::find($data_id);
    // return $edit;
    $ido = $id;
    $id = $ids;
    return view("pages.admin.kursus.submenu.edit", compact("edit", "id", "ido", "data", "kOpen", "kActive"));
  }
  public function subKursus() {
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    $data = dataKursusModel::orderBy("id_kursus", "desc")->get();
    foreach ($data as $key => $dat) {
      $data[$key]->sub_kursus = dataSubKursusModel::where("id_kursus", $dat->id_kursus)->count();
    }
    return view("pages.admin.kursus.sub.index", compact("data", "kOpen", "kActive"));
  }
  public function showEdit($id) {
    $data_id = base64_decode($id);
    $data = dataKursusModel::find($data_id);
    $kOpen = "kursus";
    $kActive = "kursus-sub";
    return view("pages.admin.kursus.buat.edit", compact("data", "kOpen", "kActive"));
  }
  public function updateKursus(Request $r, $id) {
    $data_id = base64_decode($id);
    $r->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
      'introduction' => 'required',
      'ellgibilitty' => 'required',
      'status_kursus' => 'required',
    ]);
    $i = dataKursusModel::find($data_id);
    $i->judul = $r->judul;
    $i->deskripsi = $r->deskripsi;
    $i->introduction = $r->introduction;
    $i->ellgibilitty = $r->ellgibilitty;
    $i->status_kursus = $r->status_kursus;
    if ($r->file('image') != "") {
      $target = "assets/dist/img/".$i->image;
      if (file_exists($target)) {
        unlink($target);
      }
      $ImgValue = $r->file('image');
      $getFileExt = $ImgValue->getClientOriginalExtension();
      $uploadedFile = time() . '.' . $getFileExt;
      $uploadDir = public_path('assets/dist/img/');
      $ImgValue->move($uploadDir, $uploadedFile);
      $i->image = $uploadedFile;
    }
    $i->update();

    if ($i) {
      return redirect()->route("kursus.sub")->with('success', 'Prosess Selesai');
    } else {
      return redirect()->back()->with('error', 'Prosess Gagal');
    }
  }

}