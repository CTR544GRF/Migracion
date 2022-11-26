<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tbl_inventarios;
use App\Models\tbl_registros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class inventario extends Controller
{

    public function index()
    {
        $inventario = tbl_inventarios::leftJoin('tbl_articulos as a', 'tbl_inventarios.cod_articulo', '=', 'a.cod_articulo')
            ->select('tbl_inventarios.*', 'a.tipo_articulo', 'a.descripcion_articulo')
            ->get();
        return view('inventarios.inventarios', compact('inventario'));
    }

    public function exportPdf()
    {
        $inventarios = tbl_inventarios::get();
        $pdf = PDF::loadView('pdf.inventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->download('inventarios.pdf');
    }
    public function printPdf()
    {
        $inventarios = tbl_inventarios::get();
        $pdf = PDF::loadView('pdf.inventarios', compact('inventarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('inventarios.pdf');
    }
}
