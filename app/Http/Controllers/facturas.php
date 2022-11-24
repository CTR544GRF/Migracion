<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tbl_facturas;
use App\Models\tbl_empresas;
use App\Models\tbl_usuarios;
use App\Models\tbl_articulos;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class facturas extends Controller
{
    public function exportPdf()
    {
        $facturas = tbl_facturas::get();
        $pdf = PDF::loadView('pdf.facturas', compact('facturas'))->setPaper('a4', 'landscape');
        return $pdf->download('facturas.pdf');
    }
    public function printPdf()
    {
        $facturas = tbl_facturas::get();
        $pdf = PDF::loadView('pdf.facturas', compact('facturas'))->setPaper('a4', 'landscape');
        return $pdf->stream('facturas.pdf');
    }

    public function printFactura(tbl_facturas $factura)
    {
        $facturas = tbl_empresas::all();
        $pdf = PDF::loadView('pdf.facturas', compact('facturas'))->setPaper('a4', 'landscape');
    }

    public function store(Request $request)
    {
        $request->validate([
            'valor_unitario' => 'required|digits_between:1,20|integer',
            'cantidad' => 'required|digits_between:1,20|integer',
            'iva' => 'required|digits_between:1,3|integer',
            'descripcion' => 'required|max:150|string',
            'id_user' => 'required_if:nit_empresa,null'
        ]);

        $subtotal = ($request->cantidad) * ($request->valor_unitario);
        $iva = ($subtotal * ($request->iva)) / 100;
        $total = $subtotal + $iva;

        $facturas = new tbl_facturas();
        $facturas->fecha = $request->fecha;
        $facturas->tipo_factura = $request->tipo_factura;
        $facturas->valor_unitario = $request->valor_unitario;
        $facturas->cantidad = $request->cantidad;
        $facturas->sub_total = $subtotal;
        $facturas->iva = $iva;
        $facturas->total = $total;
        $facturas->descripcion = $request->descripcion;
        $facturas->cod_articulo = $request->cod_articulo;
        $facturas->id_empresa = $request->nit_empresa;
        $facturas->id_user = $request->id_user;
        $facturas->save();
        session()->flash('guardado', 'La Factura a sido Registrada con exito');
        return redirect()->route('facturas.create');
    }

    public function index()
    {
        $facturas = tbl_facturas::all();
        return view('Facturas.facturas', compact('facturas'));
    }
    public function create()
    {
        $empresas = tbl_empresas::all();
        $usuarios = tbl_usuarios::all();
        $articulos = tbl_articulos::all();
        return view('Facturas.registrar_factura', compact('empresas', 'usuarios', 'articulos'));
    }
    public function edit(tbl_facturas $factura)
    {
        $empresas = tbl_empresas::all();
        $usuarios = tbl_usuarios::all();
        $articulos = tbl_articulos::all();
        return view('Facturas.editar_factura', compact('factura', 'empresas', 'usuarios', 'articulos'));
    }

    public function update(Request $request, tbl_facturas $factura)
    {
        $request->validate([
            'valor_unitario' => 'required|digits_between:1,10|integer',
            'cantidad' => 'required|digits_between:1,10|integer',
            'iva' => 'required|digits_between:1,3|integer',
            'descripcion' => 'required|max:150|string'
        ]);

        $subtotal = ($request->cantidad) * ($request->valor_unitario);
        $iva = $subtotal * ($request->iva);
        $total = $subtotal + $iva;

        $facturas = new tbl_facturas();
        $facturas->fecha = $request->fecha;
        $facturas->tipo_factura = $request->tipo_factura;
        $facturas->valor_unitario = $request->valor_unitario;
        $facturas->cantidad = $request->cantidad;
        $facturas->sub_total = $subtotal;
        $facturas->iva = $iva;
        $facturas->total = $total;
        $facturas->descripcion = $request->descripcion;
        $facturas->cod_articulo = $request->cod_articulo;
        $facturas->id_empresa = $request->nit_empresa;
        $facturas->id_user = $request->nit_empresa;
        $facturas->save();
        session()->flash('actualizado', 'La Factura a sido actualizada con exito');

        $empresas = tbl_empresas::all();
        $usuarios = tbl_usuarios::all();
        $articulos = tbl_articulos::all();
        return view('Facturas.editar_factura', compact('empresas', 'usuarios', 'articulos'));
    }
}
