<?php

use App\Exports\UsersExport;

use App\Http\Controllers\articulos;
use App\Http\Controllers\usuarios;
use App\Http\Controllers\empresas;
use App\Http\Controllers\facturas;
use App\Http\Controllers\entradas;
use App\Http\Controllers\roles;
use App\Http\Controllers\salidas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\inventario;
use App\Models\User;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// /*Pagina comercial*/
Route::view('/', 'welcome')->name('onepage');

//Resourses views
Route::resource('articulos', articulos::class);
Route::resource('facturas', facturas::class);
Route::resource('empresas', empresas::class);
Route::resource('usuarios', usuarios::class);
Route::resource('entradas', entradas::class);
Route::resource('salidas', salidas::class);
Route::resource('inventario', inventario::class);
Route::resource('roles', roles::class);

//Downloads

//vistas Facturas
Route::get('facturas.pdf', [facturas::class, 'exportPdf'])->name('facturas.pdf');
Route::get('facturas.print', [facturas::class, 'printPdf'])->name('facturas.print');
Route::get('factura.csv', function (UsersExport $usersExport) {
    return $usersExport->download('facturas.csv');
})->name('facturas.csv');
Route::get('factura.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('facturas.xlsx');
})->name('facturas.xlsx');

// //vistas Empresas
Route::get('empresas.pdf', [empresas::class, 'exportPdf'])->name('empresas.pdf');
Route::get('empresas.print', [empresas::class, 'printPdf'])->name('empresas.print');

Route::get('empresa.csv', function (UsersExport $usersExport) {
    return $usersExport->download('empresas.csv');
})->name('empresas.csv');

Route::get('empresa.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('empresas.xlsx');
})->name('empresas.xlsx');


// //vistas Articulos
Route::get('articulos.pdf', [articulos::class, 'exportPdf'])->name('articulos.pdf');
Route::get('articulos.print', [articulos::class, 'printPdf'])->name('articulos.print');

Route::get('articulos.csv', function (UsersExport $usersExport) {
    return $usersExport->download('articulos.csv');
})->name('articulos.csv');

Route::get('articulos.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('articulos.xlsx');
})->name('articulos.xlsx');

// //vistas Usuarios
Route::get('usuarios.pdf', [usuarios::class, 'exportPdf'])->name('usuarios.pdf');
Route::get('usuarios.print', [usuarios::class, 'printPdf'])->name('usuarios.print');
Route::get('usuarios.csv', function (UsersExport $usersExport) {
    return $usersExport->download('usuarios.csv');
})->name('usuarios.csv');
Route::get('usuarios.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('usuarios.xlsx');
})->name('usuarios.xlsx');

// //vistas Salidas
Route::get('salidas.pdf', [salidas::class, 'exportPdf'])->name('salidas.pdf');
Route::get('salidas.print', [salidas::class, 'printPdf'])->name('salidas.print');
Route::get('salidas.csv', function (UsersExport $usersExport) {
    return $usersExport->download('salidas.csv');
})->name('salidas.csv');
Route::get('salidas.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('salidas.xlsx');
})->name('salidas.xlsx');

//vistas Entradas

Route::get('entradas.pdf', [entradas::class, 'exportPdf'])->name('entradas.pdf');
Route::get('entradas.print', [entradas::class, 'printPdf'])->name('entradas.print');
Route::get('entradas.csv', function (UsersExport $usersExport) {
    return $usersExport->download('entradas.csv');
})->name('entradas.csv');
Route::get('entradas.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('entradas.xlsx');
})->name('entradas.xlsx');
