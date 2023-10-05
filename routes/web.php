<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/call-artisan-cmd', function () {
      Artisan::call('config:cache');
      Artisan::call('config:clear'); 
       $output = Artisan::output();
    return response()->json(['message' => 'Artisan command executed successfully','out' =>  $output]);
});

Route::get('/', function () { 
    return redirect('/home');
});
Auth::routes(['register' =>false ]);
Route::group(['prefix' => 'admin'], function () {

    Route::get('/profile/edit',[HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [HomeController::class, 'update'])->name('profile.update'); 
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('document', DocumentUploadController::class);
    Route::post('/upload-doc-drop', [DocumentUploadController::class, 'upload'])->name('dropzon.upload-drop');
    Route::post('/get-docs', [DocumentUploadController::class, 'getDocuments'])->name('get-docs');
    
 
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'edit'])->name('home');
