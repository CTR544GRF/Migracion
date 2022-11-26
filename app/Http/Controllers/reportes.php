<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_usuarios;
use App\Models\tbl_empresas;
use App\Models\tbl_articulos;
use App\Models\tbl_inventarios;
use Barryvdh\DomPDF\Facade\Pdf;

class reportes extends Controller
{

    //Usuarios
    public function printPdf1()
    {
        $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->where('cod_rol', '=', '1')
            ->get();
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

    public function printPdf2()
    {
        $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->where('cod_rol', '=', '2')
            ->get();
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

    public function printPdf3()
    {
        $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->where('cod_rol', '=', '3')
            ->get();
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

    public function printPdf4()
    {
        $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->get();
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

    public function printPdf5()
    {
        $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->where('cod_rol', '=', '3')
            ->get();
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

    //Empresas
    public function printPdfEmpresas1()
    {
        $empresas = tbl_empresas::where('rol', '=', 'Cliente')
            ->get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    public function printPdfEmpresas2()
    {
        $empresas = tbl_empresas::where('rol', '=', 'Proveedor')
            ->get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    public function printPdfEmpresas3()
    {
        $empresas = tbl_empresas::get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    //articulos

    public function printPdfArticulos1()
    {
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Producto terminado')
            ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos2()
    {
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Materia prima')
            ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos3()
    {
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Insumo')
        ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos4()
    {
        $articulos = tbl_articulos::get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }


    //stock

    public function printPdfInventarios1()
    {
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Producto terminado')
            ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios2()
    {
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Materia prima')
            ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios3()
    {
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Insumo')
        ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios4()
    {
        $inventarios = tbl_inventarios::get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }
}
    

