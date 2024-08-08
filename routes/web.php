<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */


// Route::get('/', function () {
//     return view('pages.auth.auth-login');
// });



// Route::middleware(['auth'])->group(function () {

//     Route::get('/home', function () {

//         return view('pages.app.dashboard-siakad', ['type_menu' => '']);
//     })->name('home');

//     Route::resource('user', UserController::class);
// });
// // resource route subject with midleware
// Route::middleware(['auth'])->group(function () {

//     Route::resource('subject', SubjectController::class);
// });

// // resource route schedule with midleware
// Route::middleware(['auth'])->group(function () {

//     Route::resource('schedule', ScheduleController::class);
// });

// // make route for generate qrcoede midleware
// Route::middleware(['auth'])->group(function () {

//     // Route::get('showqrcode', [\App\Http\Controllers\QrCodeController::class, 'showQrcode'])->name('showqrcode');
//     Route::get('createqrcode', [\App\Http\Controllers\ScheduleController::class, 'createQrcode'])->name('createqrcode');
//     Route::post('generateqrcode', [\App\Http\Controllers\ScheduleController::class, 'generateQrcode'])->name('generateqrcode');
// });

// route baru

Route::get('/', function () {
    return view('pages.auth.login', ['type_menu' => '']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
    })->name('home');
    Route::resource('user', UserController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::get('createqrcode/{schedule}', [ScheduleController::class, 'createQrcode'])->name('createqrcode');
    Route::put('generateqrcode/{schedule}', [ScheduleController::class, 'generateQrcode'])->name('generateqrcode');
});




//get showqrcode
// Route::get('showqrcode', [\App\Http\Controllers\QrCodeController::class, 'showQrcode'])->name('showqrcode');
//get schedule createqrcode
// Route::get('createqrcode', [\App\Http\Controllers\ScheduleController::class, 'createQrcode'])->name('createqrcode');

//post schedule generateqrcode
// Route::post('generateqrcode', [\App\Http\Controllers\ScheduleController::class, 'generateQrcode'])->name('generateqrcode');




// //get showqrcode
// Route::get('showqrcode', [\App\Http\Controllers\QrCodeController::class, 'showQrcode'])->name('showqrcode');
// //get schedule createqrcode
// Route::get('createqrcode', [\App\Http\Controllers\ScheduleController::class, 'createQrcode'])->name('createqrcode');

// //post schedule generateqrcode
// Route::post('generateqrcode', [\App\Http\Controllers\ScheduleController::class, 'generateQrcode'])->name('generateqrcode');
//  ROoute buat web test page
// Route::get('/', function () {
//     return view('pages.app/dashboard-siakad', ['type_menu' => '']);
// });

// Route::get('/login', function () {
//     return view('pages.auth/auth-login');
// })->name('login');


// Route::get('/register', function () {
//     return view('pages.auth/auth-register');
// })->name('register');


// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password');
// })->name('forgot');

// Route::get('/reset', function () {
//     return view('pages.auth.auth-reset-password');
// })->name('reset');

// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password');
// })->name('forgot');
