<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth' ,'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile' , 'profile')->name('admin.profile');
    Route::get('admin/edit/profile' , 'edit_profile')->name('admin_edit_profile');
    Route::post('admin/store/edits' , 'store')->name('store.profile');
    Route::get('admin/edit/email' , 'request_email_edit')->name('edit_email');
});



require __DIR__.'/auth.php';
