<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/questionnaires', [App\Http\Controllers\HomeController::class, 'questionnaires'])->name('questionnaires');
Route::get('/questionnaire/{id}', [App\Http\Controllers\HomeController::class, 'questionnaire'])->name('questionnaire');

Route::post('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/add_questionnaire', [App\Http\Controllers\AdminController::class, 'add_questionnaire'])->name('add_questionnaire');
Route::get('/admin/my_questionnaire', [App\Http\Controllers\AdminController::class, 'my_questionnaire'])->name('my_questionnaire');
Route::get('/admin/questionnaire/{id}', [App\Http\Controllers\AdminController::class, 'questionnaire'])->name('questionnaire');
Route::get('/admin/questioneds/{id}', [App\Http\Controllers\AdminController::class, 'questioned'])->name('questionnaire');
Route::get('/admin/questioneds/{id}/user-{user_id}', [App\Http\Controllers\AdminController::class, 'questioned_user'])->name('questionnaire');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'user'])->name('user');
Route::get('/admin/change_to_whom/{id}', [App\Http\Controllers\AdminController::class, 'change_to_whom'])->name('change_to_whom');
Route::post('/admin/change_to_whom/{id}', [App\Http\Controllers\AdminController::class, 'change_to_whom'])->name('change_to_whom');

Route::get('/admin/excel/{id}', [App\Http\Controllers\AdminController::class, 'excel'])->name('excel');
Route::post('/admin/excel/{id}', [App\Http\Controllers\AdminController::class, 'excel'])->name('excel');

