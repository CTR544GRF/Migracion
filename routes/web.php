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
use App\Http\Controllers\reportes;
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

//vistas inventarios
Route::get('inventarios.pdf', [inventario::class, 'exportPdf'])->name('inventarios.pdf');
Route::get('inventarios.print', [inventario::class, 'printPdf'])->name('inventarios.print');
Route::get('inventarios.csv', function (UsersExport $usersExport) {
    return $usersExport->download('inventarios.csv');
})->name('inventarios.csv');
Route::get('inventarios.xlsx', function (UsersExport $usersExport) {
    return $usersExport->download('inventarios.xlsx');
})->name('inventarios.xlsx');


//reportes pruebaaa
Route::view('/Reportes/Ver', 'reportes.reportes')->name('ver_reportes');
Route::view('/Reportes/Ver/UsuariosPDF', 'reportes.reportes_usuarios')->name('reportes_usuarios');
Route::view('/Reportes/Ver/EmpresasPDF', 'reportes.reportes_empresas')->name('reportes_empresas');
Route::view('/Reportes/Ver/articulosPDF', 'reportes.reportes_articulos')->name('reportes_articulos');
Route::view('/Reportes/Ver/facturasPDF', 'reportes.pdf_facturas')->name('pdf_facturas');
Route::view('/Reportes/Ver/stockPDF', 'reportes.reportes_inventarios')->name('reportes_inventarios');

Route::get('rusuarios.print1', [reportes::class, 'printPdf1'])->name('rusuarios.print1');
Route::get('rusuarios.print2', [reportes::class, 'printPdf2'])->name('rusuarios.print2');
Route::get('rusuarios.print3', [reportes::class, 'printPdf3'])->name('rusuarios.print3');
Route::get('rusuarios.print4', [reportes::class, 'printPdf4'])->name('rusuarios.print4');

Route::get('rempresas.print1', [reportes::class, 'printPdfEmpresas1'])->name('rempresas.print1');
Route::get('rempresas.print2', [reportes::class, 'printPdfEmpresas2'])->name('rempresas.print2');
Route::get('rempresas.print3', [reportes::class, 'printPdfEmpresas3'])->name('rempresas.print3');

Route::get('rarticulos.print1', [reportes::class, 'printPdfArticulos1'])->name('rarticulos.print1');
Route::get('rarticulos.print2', [reportes::class, 'printPdfArticulos2'])->name('rarticulos.print2');
Route::get('rarticulos.print3', [reportes::class, 'printPdfArticulos3'])->name('rarticulos.print3');
Route::get('rarticulos.print4', [reportes::class, 'printPdfArticulos4'])->name('rarticulos.print4');

Route::get('rinventarios.print1', [reportes::class, 'printPdfinventarios1'])->name('rinventarios.print1');
Route::get('rinventarios.print2', [reportes::class, 'printPdfinventarios2'])->name('rinventarios.print2');
Route::get('rinventarios.print3', [reportes::class, 'printPdfinventarios3'])->name('rinventarios.print3');
Route::get('rinventarios.print4', [reportes::class, 'printPdfinventarios4'])->name('rinventarios.print4');
