<?php

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

Route::get('/about', function() {
    // ini untuk mengahasilkan nilai balikan berupa angka
    // return 9*9;
    return "Halo selamat datang di sini" ;
});

Route::get('/greeting', function() {
    return "Selamat malam";
});

Route::get('/perhitungan', function() {
    $angka1 = 9;
    $angka2 = 10;

    return $angka1*$angka2;
});

Route::get('/malam', function() {
    return view('malam', ['nama' => 'Joko']);
});

// Memanggill router view  secara default
// Route::get('/contact', function() {
//     return view('contact');
// });

// cara yang lebih simple
// Route::view('/contact', 'contact');

// mengirimkan argument ke view 
// Route::view('/contact', 'contact', ['name' => 'Avriansyah', 'phone' => '0819191919']);

Route::get('/contact', function() {
    return view('contact', ['name' => 'Av riansyah', 'phone' => '0819191919']);
});

// Redirect halaman website untuk mengalihkan halaman 1 ke halaman yang lian tetepi tetep menggunakan url halaman 1
Route::redirect('/countactus', '/contact');

// route dengan parameter
Route::get('/product', function() {
    return 'product';  
});

Route::get('/product/{id}', function($id){
    // return 'ini adalah product dengan id = '.$id;

    // dengan router view
    return view('product.detail', ['id' => $id]);
});
 

//untuk memudahkan penggantian url parent jadi tidak perlu mengganti secara manual
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Halaman user';
    });
    Route::get('/pegawai', function () {
        return 'Halaman pegawai';
    });
    Route::get('/staf', function () {
        return 'Halaman staff';
    });
});


// use App\Http\Controllers\UserController;
// Route::prefix('user')->group(function () {
//     Route::get('/', [UserController::class, 'index']);
//     Route::get('/store', [UserController::class, 'store']);
//     Route::get('/update', [UserController::class, 'update']);
//     Route::get('/delete', [UserController::class, 'delete']);
// });


use App\Http\Controllers\UserController;
Route::controller(UserController::class)->group(function() {
    Route::get('user/', 'index');
    Route::get('user/add', 'add');
    Route::get('user/store', 'store');
    Route::get('user/edit/{id}', 'edit');
    Route::get('user/update/{id}', 'update');
    Route::get('user/delete/{id}', 'delete');
});