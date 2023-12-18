<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PPIDController;
use App\Http\Controllers\TerkaitController;
use App\Http\Controllers\RunningtextController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// Example Routes
Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index')->name('landing');
    Route::get('/survey', 'surveyShow')->name('survey.show');
    Route::get('/kegiatan/{id?}/show', 'show')->name('landing.show');
    Route::get('/ppid/{group?}/content', 'PPIDshow')->name('ppid.groupshow');
    Route::get('/all-kegiatan', 'kegiatanShow')->name('kegiatan-all');
});

Route::controller(ProfilController::class)->group(function (){
    Route::get('/bapenda', 'bapenda')->name('bapenda.show');
    Route::get('/kepalabadan', 'kepalaBadan')->name('kepalabadan.show');
    Route::get('/sekretariat', 'sekretariat')->name('sekretariat.show');

});

Auth::routes();

Route::get('/foradmin', [HomeController::class, 'index'])->name('admin');
Route::get('/home', [HomeController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::controller(HeaderController::class)->group(function () {
        Route::get('/header','index')->name('header.index');
        Route::get('/addheader','create')->name('header.create');
        Route::post('/header', 'insert')->name('header.insert');
        Route::post('/header/update', 'update')->name('header.update');
        Route::post('/header/updatebg', 'updateBg')->name('header.updatebg');
    });

    Route::controller(VisiMisiController::class)->group(function () {
        Route::get('/visimisi/{id?}','index')->name('visimisi.index');
        Route::get('/addvisi','createVisi')->name('visi.create');
        Route::post('/addvisi','insertVisi')->name('visi.insert');
        Route::post('/visi', 'updateVisi')->name('visi.update');
        Route::get('/addmisi','createMisi')->name('misi.create');
        Route::post('/addmisi','insertMisi')->name('misi.insert');
        Route::get('/misi/{id}/show','showMisi')->name('misi.show');
        Route::post('/misi','updateMisi')->name('misi.update');
        Route::get('/misi/{id}','destroyMisi')->name('misi.destroy');
        Route::post('/misi/image_upload', 'uploadMisi')->name('misi.upload');
        Route::get('/misi/{id}/preview', 'previewMisi')->name('misi.preview');
    });

    Route::controller(kegiatanController::class)->group(function () {
        Route::get('/kegiatan', 'index')->name('kegiatan.index');
        Route::get('/addkegiatan', 'create')->name('kegiatan.create');
        Route::post('/addkegiatan', 'insert')->name('kegiatan.insert');
        Route::get('/kegiatan/{id}/edit', 'show')->name('kegiatan.edit');
        Route::post('/kegiatan/update', 'update')->name('kegiatan.update');
        Route::get('/kegiatan/{id}', 'destroy')->name('kegiatan.destroy');
        Route::post('/kegiatan', 'isActive')->name('kegiatan.isactive');
        Route::post('/kegiatan/showberita', 'showBerita')->name('kegiatan.showberita');
        Route::post('/kegiatan/image_upload', 'upload')->name('kegiatan.upload');
        Route::get('/kegiatan/{id}/preview', 'preview')->name('kegiatan.preview');
    });

    Route::controller(PelayananController::class)->group(function () {
        Route::get('/pelayanan', 'index')->name('pelayanan.index');
        Route::get('/addpelayanan', 'create')->name('pelayanan.create');
        Route::post('/addpelayanan', 'insert')->name('pelayanan.insert');
        Route::get('/pelayanan/{id}/show', 'show')->name('pelayanan.show');
        Route::post('/pelayanan/update', 'update')->name('pelayanan.update');
        Route::get('/pelayanan/{id}', 'destroy')->name('pelayanan.destroy');
        Route::post('/pelayanan', 'isActive')->name('pelayanan.isactive');
        Route::post('/pelayanan/showdescription', 'showDesc')->name('pelayanan.showdescription');
        Route::post('/pelayanan/upload', 'upload')->name('pelayanan.upload');
        Route::get('/pelayanan/{id}/preview', 'preview')->name('pelayanan.preview');
    });

    Route::controller(SocialController::class)->group(function () {
        Route::get('/social', 'index')->name('social.index');
        Route::get('/addsocial', 'create')->name('social.create');
        Route::post('/addsocial', 'insert')->name('social.insert');
        Route::get('/social/{id}/show', 'show')->name('social.show');
        Route::post('/social/update', 'update')->name('social.update');
        Route::get('/social/{id}', 'destroy')->name('social.destroy');
        Route::post('/social', 'isActive')->name('social.isactive');
    });

    Route::controller(PPIDController::class)->group(function () {
        Route::get('/ppid', 'index')->name('ppid.index');
        Route::get('/addppid', 'create')->name('ppid.create');
        Route::post('/addppid', 'insert')->name('ppid.insert');
        Route::get('/ppid/{id}/show', 'show')->name('ppid.show');
        Route::post('/ppid/update', 'update')->name('ppid.update');
        Route::get('/ppid/{id}', 'destroy')->name('ppid.destroy');
        Route::post('/ppid', 'isActive')->name('ppid.isactive');
        Route::post('/ppid/image_upload', 'upload')->name('ppid.upload');
        Route::get('/ppid/{id}/preview', 'preview')->name('ppid.preview');
    });

    Route::controller(TerkaitController::class)->group(function () {
        Route::get('/terkait', 'index')->name('terkait.index');
        Route::get('/addterkait', 'create')->name('terkait.create');
        Route::post('/addterkait', 'insert')->name('terkait.insert');
        Route::get('/terkait/{id}/show', 'show')->name('terkait.show');
        Route::post('/terkait/update', 'update')->name('terkait.update');
        Route::get('/terkait/{id}', 'destroy')->name('terkait.destroy');
        Route::post('/terkait', 'isActive')->name('terkait.isactive');
    });

    Route::controller(RunningtextController::class)->group(function () {
        Route::get('/runningtext', 'index')->name('runningtext.index');
        Route::get('/addrunningtext', 'create')->name('runningtext.create');
        Route::post('/addrunningtext', 'insert')->name('runningtext.insert');
        Route::get('/runningtext/{id}/show', 'show')->name('runningtext.show');
        Route::post('/runningtext/update', 'update')->name('runningtext.update');
        Route::get('/runningtext/{id}', 'destroy')->name('runningtext.destroy');
        Route::post('/runningtext', 'isActive')->name('runningtext.isactive');
    });

    Route::controller(PengumumanController::class)->group(function () {
        Route::get('/pengumuman', 'index')->name('pengumuman.index');
        Route::get('/addpengumuman', 'create')->name('pengumuman.create');
        Route::post('/addpengumuman', 'insert')->name('pengumuman.insert');
        Route::get('/pengumuman/{id}/show', 'show')->name('pengumuman.show');
        Route::post('/pengumuman/update', 'update')->name('pengumuman.update');
        Route::get('/pengumuman/{id}', 'destroy')->name('pengumuman.destroy');
        Route::post('/pengumuman', 'isActive')->name('pengumuman.isactive');
        Route::post('/masterpengumuman', 'masterisActive')->name('masterpengumuman.isactive');
        Route::post('/pengumuman/image_upload', 'upload')->name('pengumuman.upload');
        Route::get('/pengumuman/{id}/preview', 'preview')->name('pengumuman.preview');
    });
    Route::controller(FaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('faq.index');
        Route::get('/addfaq', 'create')->name('faq.create');
        Route::post('/addfaq', 'insert')->name('faq.insert');
        Route::get('/faq/{id}/edit', 'show')->name('faq.edit');
        Route::post('/faq/update', 'update')->name('faq.update');
        Route::post('/faq', 'isActive')->name('faq.isactive');
        Route::get('/faq/preview', 'preview')->name('faq.preview');
        Route::get('/faq/{id}', 'destroy')->name('faq.destroy');
        // Route::post('/faq/showberita', 'showBerita')->name('faq.showberita');
      
    });
    Route::controller(ProfilController::class)->group(function () {
        Route::get('/profil', 'index')->name('profil.index');
        Route::get('/addkepalabadan', 'createKepalaBadan')->name('kepala-badan.create');
        Route::post('/addkepalabadan', 'insert')->name('kepala-badan.insert');
        Route::get('/kepalabadan/{id}/edit', 'show')->name('kepala-badan.edit');
        Route::post('/kepalabadan/update', 'update')->name('kepala-badan.update');
        Route::get('/kepalabadan/{id}/preview', 'previewKepalaBadan')->name('kepala-badan.preview');
        // Route::post('/faq', 'isActive')->name('faq.isactive');
        // Route::get('/faq/{id}', 'destroy')->name('faq.destroy');
        // // Route::post('/faq/showberita', 'showBerita')->name('faq.showberita');
      
    });


    Route::controller(AccountController::class)->group(function () {
        Route::get('/account','index')->name('account.index');
        Route::put('/account', 'update');
    });
});

Route::middleware(['admin'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user.index');
        Route::get('/adduser', 'create')->name('user.create');
        Route::post('/adduser', 'insert')->name('user.insert');
        Route::get('/user/{id}/show', 'show')->name('user.show');
        Route::post('/user/update', 'update')->name('user.update');
        Route::get('/user/{id}', 'destroy')->name('user.destroy');
        Route::post('/user', 'isActive')->name('user.isactive');
    });
});
