<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
// Memberikan nama 'login' ke rute login agar user yang belum login dapat diarahkan ke rute ini
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');

Route::get('/adduser', [AdminController::class, 'adduser'])->name('login.adduser')->middleware('guest');
Route::post('/storeuser', [AdminController::class, 'storeuser'])->name('login.storeuser')->middleware('guest');

Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/home', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/index', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/index2', [AdminController::class, 'index2'])->name('admin.index2')->middleware('auth');
Route::get('/recyclebin', [AdminController::class, 'recyclebin'])->name('admin.recyclebin')->middleware('auth');
Route::get('/recyclebin2', [AdminController::class, 'recyclebin2'])->name('admin.recyclebin2')->middleware('auth');
Route::get('/search', [AdminController::class, 'search'])->name('admin.search')->middleware('auth');
Route::get('/add', [AdminController::class, 'create'])->name('admin.create')->middleware('auth');
Route::get('/add2', [AdminController::class, 'create2'])->name('admin.create2')->middleware('auth');
Route::post('/store', [AdminController::class, 'store'])->name('admin.store')->middleware('auth');
Route::post('/store2', [AdminController::class, 'store2'])->name('admin.store2')->middleware('auth');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::get('/edit2/{id}', [AdminController::class, 'edit2'])->name('admin.edit2')->middleware('auth');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update')->middleware('auth');
Route::post('/update2/{id}', [AdminController::class, 'update2'])->name('admin.update2')->middleware('auth');
Route::post('/delete/{id}', [AdminController::class,  'delete'])->name('admin.delete')->middleware('auth');
Route::post('/delete2/{id}', [AdminController::class,  'delete2'])->name('admin.delete2')->middleware('auth');
Route::post('/restore/{id}', [AdminController::class,  'restore'])->name('admin.restore')->middleware('auth');
Route::post('/restore2/{id}', [AdminController::class,  'restore2'])->name('admin.restore2')->middleware('auth');
Route::post('deletepermanent/{id}', [AdminController::class,  'deletepermanent'])->name('admin.deletepermanent')->middleware('auth');