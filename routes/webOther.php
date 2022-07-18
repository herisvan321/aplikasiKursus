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

Route::get('/', "otherController@index")->name("root");
Route::prefix('other')->group(function () {
    Route::get('/about', "otherController@about")->name("about");
    Route::get('/tutor', "otherController@tutor")->name("tutor");
    Route::get('/register', "otherController@register")->name("other.register");
    Route::post('/register', "otherController@setregister")->name("other.register.post");
    Route::get('/login', "otherController@login")->name("other.login");
    Route::post('/login', "otherController@setlogin")->name("other.login.post");
    Route::get('/contact', "otherController@contact")->name("contactus");
    Route::get('/details/{id}', "otherController@details")->name("other.details");
    Route::get('/details/{id}/{child}', "otherController@details")->name("other.details.child");
    
});
Route::middleware('auth:peserta')->group(function () {
    Route::prefix('/peserta')->group(function () {
        Route::get('/', "pesertaController@home")->name("peserta.home");
        Route::get('/in-proses', "pesertaController@inproses")->name("peserta.inproses");
        Route::get('/payment/{idorder}', "pesertaController@pagePayment")->name("peserta.payment");
        Route::put('/payment/{idorder}', "pesertaController@postPayment")->name("peserta.payment.put");
        Route::get('/complate', "pesertaController@complate")->name("peserta.complate");
       
        Route::get('/logout', "pesertaController@setLogout")->name("peserta.logout");

        Route::prefix('other')->group(function () {
            Route::get('/{idkursus}', "pesertaController@dashboard")->name("other.dashboard");
            Route::get('/{idkursus}/{idsubkursus}', "pesertaController@dashboard")->name("other.dashboard.child");
            Route::get('dashboard/{idkursus}/{idsubkursus}/{idsubmenukursus}', "pesertaController@pageDashboard")->name("other.dashboard.page");
            Route::get('dashboard/{idkursus}/{idsubkursus}/{idsubmenukursus}/{iddatatema}/index', "pesertaController@pageTema")->name("other.dashboard.page.tema");
            Route::get('dashboard/{id}/kondisi/{kondisi}/step', "pesertaController@step")->name("other.dashboard.step");
            Route::get('dashboard/{idkursus}/{idsubkursus}/{idsubmenukursus}/{iddatatema}/{idsubmenutema}/ex', "pesertaController@pageTemaEx")->name("other.dashboard.page.tema.ex");
            Route::prefix('kuis')->group(function () {
              Route::get('dashboard/kuis/konfirmasi/data/{id}', "pesertaController@konfirmasiKuis")->name("other.dashboard.konfirmasi.kuis");
              Route::get('page/{idKuis}/{noSoal}/{idPesertaKuis}', "pesertaController@kuisSoal")->name('kuis.soal');
              Route::get('page/{idKuis}/{noSoal}}/{idPesertaKuis}/selesai', "pesertaController@kuisSoalSelesai")->name('kuis.soal.selesai');
            });
        });
    });
});
