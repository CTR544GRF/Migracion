<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_usuarios;
use Barryvdh\DomPDF\Facade\Pdf;

class reportes extends Controller
{

    public function printPdf()
    {
        $usuarios = tbl_usuarios::get();
        $pdf = PDF::loadView('reportes.pdf_usuarios');
        return $pdf->stream();
    }
    
}
