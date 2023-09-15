<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController,
    RoleController,
    PermissionController,
    UserController,
    DocumentUploadController

    
};
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

Route::group(['prefix' => 'admin'], function () {

    Route::get('/profile/edit',[HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [HomeController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('document', DocumentUploadController::class);

    Route::post('/upload-doc-drop', [DocumentUploadController::class, 'upload'])->name('dropzon.upload-drop');

    
    



})->middleware('auth');

// Route::middleware(['auth', 'can:manage users'])->group(function () {
//     Route::resource('users', UserController::class);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
