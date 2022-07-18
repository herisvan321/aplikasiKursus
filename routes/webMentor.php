<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('mentor')->group(function () {
  Route::get('/', "otherController@indexMentor")->name("rootMentor");
  Route::post('/login', "otherController@setloginMentor")->name("mentor.login.post");
});
Route::middleware('auth:mentor')->group(function () {
    Route::prefix('/mentor')->group(function () {
        Route::prefix('/home')->group(function () {
          Route::get('/', "mentorController@home")->name("mentor.home");
          Route::get('/menu-kursus/{id}', "mentorKursusController@menuKursus")->name("mentor.home.menuKursus");
          Route::get('/add/menu/{id}', 'mentorKursusController@addSubMenuKursus')->name('mentor.kursus.menu');
          Route::prefix('/sub-kursus')->group(function () {
            Route::post('/add/menu/{id}', 'mentorKursusController@saveMenuSubKursus')->name('mentor.kursus.sub.add.menu.save');
            Route::post('/add/{id}', 'mentorKursusController@saveSubKursus')->name('mentor.kursus.sub.add.save');
            Route::get('/edit/menu/{id}/{ids}', 'mentorKursusController@editMenuSubKursus')->name('mentor.kursus.sub.menu.edit');
            Route::put('/update/menu/{id}', 'mentorKursusController@updateMenuSubKursus')->name('mentor.kursus.sub.menu.update');
            Route::prefix('/sub-menu')->group(function () {
                Route::get('/edit/menu/{id}/{ids}', 'mentorKursusController@editSubMenuKursus')->name('mentor.kursus.menu.edit');
            });
            
          });
          Route::prefix('/views')->group(function () {
              Route::get('/{idsubmenu}', 'mentorKursusController@viewsKursus')->name('mentor.kursus.views');
              Route::get('/{idsubmenu}/edit/{idedit}', 'mentorKursusController@viewsEditKursus')->name('mentor.tema.kursus.menu.edit');
              Route::post('/add/menu/{id}', 'mentorKursusController@saveSubMenuKursus')->name('mentor.kursus.menu.save');
              Route::put('/text/{idsubmenu}', 'mentorKursusController@updateText')->name('mentor.kursus.views.update.text');
              Route::post('/text/{idsubmenu}', 'mentorKursusController@saveText')->name('mentor.kursus.views.save.text');
              Route::put('/forum/{iddataforum}', 'mentorKursusController@updateForum')->name('mentor.kursus.views.update.forum');
              Route::post('/forum/{idsubmenu}', 'mentorKursusController@saveForum')->name('mentor.kursus.views.save.forum');
              Route::post('/message/{idsubmenu}', 'mentorKursusController@saveMessage')->name('mentor.kursus.views.save.message');
              Route::put('/message/{iddatamessage}', 'mentorKursusController@updateMessage')->name('mentor.kursus.views.update.message');
              Route::post('/rating/{idsubmenu}', 'mentorKursusController@saveRatings')->name('mentor.kursus.views.save.ratings');
              Route::put('/rating/{iddatarating}', 'mentorKursusController@updateRatings')->name('mentor.kursus.views.update.ratings');
              
              Route::post('/tema/{idsubmenu}', 'mentorKursusController@saveTema')->name('mentor.kursus.views.save.tema');
              Route::put('/tema/{iddatatema}', 'mentorKursusController@updateTema')->name('mentor.kursus.views.update.tema');
              Route::put('/update/menu/{id}', 'mentorKursusController@updateSubMenuKursus')->name('mentor.kursus.menu.update');
          });
          Route::prefix('/tema')->group(function () {
            Route::post('/sub-menu-tema/save/{id}', 'mentorKursusController@saveSubMenuTema')->name('mentor.kursus.views.sub-menu-tema.save');
            Route::put('/sub-menu-tema/update/{id}', 'mentorKursusController@updateSubMenuTema')->name('mentor.kursus.views.sub-menu-tema.update');
            Route::post('/sub-menu-tema/kuis/content/{id}', 'mentorKursusController@saveKuis')->name('mentor.kursus.views.sub-menu-tema.kuis.save');
            Route::put('/sub-menu-tema/kuis/content/update/{id}', 'mentorKursusController@updateKuis')->name('mentor.kursus.views.sub-menu-tema.kuis.update');
            Route::post('/menu-tema/save/{id}', 'mentorKursusController@saveMenuTema')->name('mentor.kursus.views.menu-tema.save');
            Route::put('/menu-tema/update/{id}', 'mentorKursusController@updateMenuTema')->name('mentor.kursus.views.menu-tema.update');
            Route::get('/menu-tema/{id}', 'mentorKursusController@getMenuTema')->name('mentor.kursus.views.menu-tema');
            Route::get('/menu-tema/kuis/soal/{id}', 'mentorKursusController@soalIndex')->name('mentor.kursus.views.kuis.soal');
            Route::get('/menu-tema/kuis/soal/input/{id}', 'mentorKursusController@soalInput')->name('mentor.kursus.views.kuis.soal.input');
            Route::get('/menu-tema/kuis/soal/show/{id}', 'mentorKursusController@showSoal')->name('mentor.kursus.views.kuis.soal.show');
            Route::get('/menu-tema/kuis/soal/edit/{id}', 'mentorKursusController@editSoal')->name('mentor.kursus.views.kuis.soal.edit');
            Route::post('/menu-tema/kuis/soal/save/{id}', 'mentorKursusController@saveSoal')->name('mentor.kursus.views.kuis.soal.save');
            Route::put('/menu-tema/kuis/soal/update/{id}', 'mentorKursusController@updateSoal')->name('mentor.kursus.views.kuis.soal.update');
            Route::get('/menu-tema/{id}/edit/{idedit}', 'mentorKursusController@editMenuTema')->name('mentor.kursus.views.menu-tema.edit');
            Route::get('/sub-menu-tema/{id}', 'mentorKursusController@getSubMenuTema')->name('mentor.kursus.views.sub-menu-tema');
            Route::get('/sub-menu-tema/{id}/edit/{idedit}', 'mentorKursusController@editSubMenuTema')->name('mentor.kursus.views.sub-menu-tema.edit');
            Route::get('/sub-menu-tema/{id}/edit/{idedit}', 'mentorKursusController@editSubMenuTema')->name('mentor.kursus.views.sub-menu-tema.edit');
            Route::get('/sub-menu-tema/content/{id}', 'mentorKursusController@getContentTema')->name('mentor.kursus.views.sub-menu-tema.content');
            Route::get('/sub-menu-tema/content/{id}/edit/{idedit}', 'mentorKursusController@editContentTema')->name('mentor.kursus.views.sub-menu-tema.content.edit');
            Route::post('/sub-menu-tema/videos/content/{id}', 'mentorKursusController@saveVideos')->name('mentor.kursus.views.sub-menu-tema.videos.save');
            Route::put('/sub-menu-tema/videos/content/edit/{id}', 'mentorKursusController@updateVideos')->name('mentor.kursus.views.sub-menu-tema.videos.update');
            Route::put('/sub-menu-tema/audios/content/edit/{id}', 'mentorKursusController@updateAudios')->name('mentor.kursus.views.sub-menu-tema.audios.update');
            Route::put('/sub-menu-tema/readings/content/edit/{id}', 'mentorKursusController@updateReadings')->name('mentor.kursus.views.sub-menu-tema.readings.update');
            Route::get('/sub-menu-tema/readings/content/download/{id}', 'mentorKursusController@downloadReadings')->name('mentor.kursus.views.sub-menu-tema.readings.download');
            Route::post('/sub-menu-tema/audio/content/{id}', 'mentorKursusController@saveAudios')->name('mentor.kursus.views.sub-menu-tema.audios.save');
            Route::post('/sub-menu-tema/readings/content/{id}', 'mentorKursusController@saveReadings')->name('mentor.kursus.views.sub-menu-tema.readings.save');
          });
        });
        
        Route::get('/massages', "mentorController@massages")->name("mentor.massages");
    });
});
