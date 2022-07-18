<?php

use Illuminate\Support\Facades\Route;
include "webOther.php";
include "webMentor.php";

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


Auth::routes();
Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('kursus')->group(function () {
        Route::get('/buat', 'Admin\Kursus\kursusController@buatKursus')->name('kursus.buat');
        Route::post('/buat', 'Admin\Kursus\kursusController@saveKursus')->name('kursus.buat');
        Route::get('/edit/{id}', 'Admin\Kursus\kursusController@showEdit')->name('kursus.edit');
        Route::put('/edit/{id}', 'Admin\Kursus\kursusController@updateKursus')->name('kursus.edit.update');
        Route::prefix('/sub-kursus')->group(function () {
            Route::get('/', 'Admin\Kursus\kursusController@subKursus')->name('kursus.sub');
            Route::get('/add/{id}', 'Admin\Kursus\kursusController@addSubKursus')->name('kursus.sub.add');
            Route::post('/add/{id}', 'Admin\Kursus\kursusController@saveSubKursus')->name('kursus.sub.add.save');
            Route::get('/edit/{id}/{ids}', 'Admin\Kursus\kursusController@editSubKursus')->name('kursus.sub.edit');
            Route::put('/update/{id}', 'Admin\Kursus\kursusController@updateSubKursus')->name('kursus.sub.update');
            Route::get('/add/menu/{id}', 'Admin\Kursus\kursusController@addMenuSubKursus')->name('kursus.sub.add.menu');
            Route::post('/add/menu/{id}', 'Admin\Kursus\kursusController@saveMenuSubKursus')->name('kursus.sub.add.menu.save');
            Route::get('/edit/menu/{id}/{ids}', 'Admin\Kursus\kursusController@editMenuSubKursus')->name('kursus.sub.menu.edit');
            Route::put('/update/menu/{id}', 'Admin\Kursus\kursusController@updateMenuSubKursus')->name('kursus.sub.menu.update');
            Route::prefix('/sub-menu')->group(function () {
                Route::get('/add/menu/{id}', 'Admin\Kursus\kursusController@addSubMenuKursus')->name('kursus.menu');
                Route::post('/add/menu/{id}', 'Admin\Kursus\kursusController@saveSubMenuKursus')->name('kursus.menu.save');
                Route::get('/edit/menu/{id}/{ids}', 'Admin\Kursus\kursusController@editSubMenuKursus')->name('kursus.menu.edit');
                Route::put('/update/menu/{id}', 'Admin\Kursus\kursusController@updateSubMenuKursus')->name('kursus.menu.update');
                Route::prefix('/views')->group(function () {
                    Route::get('/{idsubmenu}', 'Admin\Kursus\kursusController@viewsKursus')->name('kursus.views');
                    Route::get('/text/{idsubmenu}', 'Admin\Kursus\kursusController@downloadText')->name('kursus.views.download.text');
                    Route::post('/text/{idsubmenu}', 'Admin\Kursus\kursusController@saveText')->name('kursus.views.save.text');
                    Route::put('/text/{idsubmenu}', 'Admin\Kursus\kursusController@updateText')->name('kursus.views.update.text');
                    Route::post('/message/{idsubmenu}', 'Admin\Kursus\kursusController@saveMessage')->name('kursus.views.save.message');
                    Route::put('/message/{iddatamessage}', 'Admin\Kursus\kursusController@updateMessage')->name('kursus.views.update.message');
                    Route::post('/rating/{idsubmenu}', 'Admin\Kursus\kursusController@saveRatings')->name('kursus.views.save.ratings');
                    Route::put('/rating/{iddatarating}', 'Admin\Kursus\kursusController@updateRatings')->name('kursus.views.update.ratings');
                    Route::post('/forum/{idsubmenu}', 'Admin\Kursus\kursusController@saveForum')->name('kursus.views.save.forum');
                    Route::put('/forum/{iddataforum}', 'Admin\Kursus\kursusController@updateForum')->name('kursus.views.update.forum');
                    Route::post('/tema/{idsubmenu}', 'Admin\Kursus\kursusController@saveTema')->name('kursus.views.save.tema');
                    Route::put('/tema/{iddatatema}', 'Admin\Kursus\kursusController@updateTema')->name('kursus.views.update.tema');
                    Route::get('/add/menu/{id}', 'Admin\Kursus\kursusController@addSubMenuKursus')->name('kursus.menu');
                    Route::post('/add/menu/{id}', 'Admin\Kursus\kursusController@saveSubMenuKursus')->name('kursus.menu.save');
                    Route::get('/edit/menu/{id}/{ids}', 'Admin\Kursus\kursusController@editSubMenuKursus')->name('kursus.menu.edit');
                    Route::put('/update/menu/{id}', 'Admin\Kursus\kursusController@updateSubMenuKursus')->name('kursus.menu.update');
                    Route::prefix('/tema')->group(function () {
                        Route::get('/menu-tema/{id}', 'Admin\Kursus\kursusController@getMenuTema')->name('kursus.views.menu-tema');
                        Route::post('/menu-tema/save/{id}', 'Admin\Kursus\kursusController@saveMenuTema')->name('kursus.views.menu-tema.save');
                        Route::get('/sub-menu-tema/{id}', 'Admin\Kursus\kursusController@getSubMenuTema')->name('kursus.views.sub-menu-tema');
                        Route::post('/sub-menu-tema/save/{id}', 'Admin\Kursus\kursusController@saveSubMenuTema')->name('kursus.views.sub-menu-tema.save');
                        Route::get('/sub-menu-tema/content/{id}', 'Admin\Kursus\kursusController@getContentTema')->name('kursus.views.sub-menu-tema.content');
                        Route::post('/sub-menu-tema/videos/content/{id}', 'Admin\Kursus\kursusController@saveVideos')->name('kursus.views.sub-menu-tema.videos.save');
                        Route::post('/sub-menu-tema/audio/content/{id}', 'Admin\Kursus\kursusController@saveAudios')->name('kursus.views.sub-menu-tema.audios.save');
                        Route::post('/sub-menu-tema/kuis/content/{id}', 'Admin\Kursus\kursusController@saveKuis')->name('kursus.views.sub-menu-tema.kuis.save');
                        
                        
                    });
                });
            });
            
        });
    });
});
