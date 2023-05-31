<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MainController::class , 'GoDashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/GoCreatePost' , [MainController::class , 'GoCreatePost'])->name('CreateView');
Route::post('/RecordPost' , [MainController::class , 'RecordPost']);
Route::get('/Comments/{id}' , [MainController::class , 'GoComments']);
Route::post('/RecordeComment/{id}' , [MainController::class , 'RecordComment']);
Route::post('/SetMoreData' , [MainController::class , 'SetMoreData']);
Route::get('/Reflect/{name}' , [MainController::class , 'ReflectProfile']);
Route::get('/GoNotifications' , [MainController::class , 'GoNotifications'])->name('Notifications');
Route::get('/markAsRead/{id}' , [MainController::class , 'markAsRead'])->name('gg');
Route::post('/change' , [MainController::class , 'ChangePhoto']);
Route::get('/deleteNotifications/' , [MainController::class , 'deleteNotifications']);
Route::get('/RecordLike/{not_id}' , [MainController::class , 'RecordLike']);





require __DIR__.'/auth.php';
