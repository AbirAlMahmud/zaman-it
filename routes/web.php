<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AllClientController;
use App\Http\Controllers\AssignPersonController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

    Route::prefix('all_client')->group(function () {

        Route::get('/', [AllClientController::class, 'index'])->name('all_client.index');
        Route::get('/create', [AllClientController::class, 'create'])->name('all_client.create');

        Route::post('/store', [AllClientController::class, 'store'])->name('all_client.store');
        Route::get('/edit/{id}', [AllClientController::class, 'edit'])->name('all_client.edit');
        Route::post('/update/{id}', [AllClientController::class, 'update'])->name('all_client.update');
        Route::delete('/destroy/{id}', [AllClientController::class, 'destroy'])->name('all_client.destroy');

        Route::post('/report/{id}', [AllClientController::class, 'report'])->name('all_client.report');

        Route::get('/send-sms', [AllClientController::class, 'sendSms'])->name('send.sms');

        Route::get('/log/{id}', [AllClientController::class, 'log'])->name('all_client.log');

        Route::post('/notify/{clientId}', [NotificationController::class, 'sendNotification'])->name('send.notification');


    });

    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');

        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    });

    Route::prefix('service')->group(function () {

        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');

        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('/destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    });

    Route::prefix('assign_person')->group(function () {

        Route::get('/', [AssignPersonController::class, 'index'])->name('assign_person.index');
        Route::get('/create', [AssignPersonController::class, 'create'])->name('assign_person.create');

        Route::post('/store', [AssignPersonController::class, 'store'])->name('assign_person.store');
        Route::get('/edit/{id}', [AssignPersonController::class, 'edit'])->name('assign_person.edit');
        Route::post('/update/{id}', [AssignPersonController::class, 'update'])->name('assign_person.update');
        Route::delete('/destroy/{id}', [AssignPersonController::class, 'destroy'])->name('assign_person.destroy');

    });

});

require __DIR__ . '/auth.php';
