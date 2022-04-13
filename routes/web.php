<?php

use App\Http\Controllers\Auth\LoginDoctorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logindoc', function () {
    return view('auth/loginDoctor');
})->name('loginDoc');
Route::get('/doctor', function () {
    return view('doctor');
})->name('doctor');

Auth::routes();
Route::post('/logedIn', [LoginDoctorController::class, 'doctorLogin'])->name('loginDoctor');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
