<?php

use App\Models\Field_place;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\FieldPlaceController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\MatrikController;

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('dashboard_admin');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/p', [AuthController::class, 'p'])->name('p');
Route::get('/regist', [AuthController::class, 'regist'])->name('regist');
Route::post('/p', [AuthController::class, 'post_p'])->name('post_p');
Route::post('/regist', [AuthController::class, 'post_regist'])->name('post_regist');


Route::get('/email/need-verification', [VerifyEmailController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware('auth', 'signed')->name('verification.verify');


require __DIR__ . '/auth.php';

Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [SocialController::class, 'googleCallback'])->name('google.callback');


Route::get('/field_place', [AllController::class, 'field_place'])->name('field_place');
Route::get('/contact', [AllController::class, 'contact'])->name('contact');

Route::get('kreteria', function () {
    return view('ahp.kriteria');
})->name('kriteria');

Route::get('result', function () {
    return view('ahp.result');
})->name('result');


Route::get('dashboard_admin', function () {
    return view('admin.dashboard_admin');
})->name('dashboard_admin');

Route::get('manajemen_field', function () {
    return view('admin.manajemen_field');
})->name('manajemen_field');

Route::get('manajemen_user', function () {
    return view('admin.manajemen_user');
})->name('manajemen_user');


Route::get('/field_place', [FieldPlaceController::class, 'index'])->name('field_place');
Route::get('/field_place/add', [FieldPlaceController::class, 'create'])->name('field_place.create');
Route::post('/field_place/create', [FieldPlaceController::class, 'store'])->name('field_place.store');
Route::get('/field_place/{field_place}/edit', [FieldPlaceController::class, 'edit'])->name('field_place.edit');
Route::put('/field_place/{field_place}', [FieldPlaceController::class, 'update'])->name('field_place.update');
Route::delete('/field_place/{field_place}', [FieldPlaceController::class, 'destroy'])->name('field_place.destroy');


Route::get('tambah_field_place', function () {
    return view('ahp.tambah_field');
})->name('tambah_field');


Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');


Route::get('/perhitungan', [MatrikController::class, 'index'])->name('perhitungan');
Route::post('/store', [MatrikController::class, 'store'])->name('store_matrik');
Route::get('/hasil', [MatrikController::class, 'matrik'])->name('hasil');
Route::get('/bobot_alternatif', [MatrikController::class, 'show_bobot'])->name('bobot_alternatif');

Route::get('result', function () {
    return view('ahp.result');
})->name('result');

// Route::get('/result', [MatrikController::class, 'matrik'])->name('result');
// Route::get('/result', [MatrikController::class, 'hitung_alternatif'])->name('result');
Route::get('/result', [MatrikController::class, 'perangkingan'])->name('result');

Route::get('/list_lapangan', [FieldPlaceController::class, 'list_lapangan'])->name('list_lapangan');
