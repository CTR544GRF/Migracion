<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tbl_facturas;
use App\Models\tbl_empresas;
use App\Models\tbl_totalfactura;
use App\Models\User;
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
    
    public function printFactura(){
        $facturas = tbl_empresas::all();
        $pdf = PDF::loadView('pdf.facturas', compact('facturas'))->setPaper('a4', 'landscape');
    }

    public function store(Request $request, tbl_totalfactura $total)
    {
        
        $cantidadArticulos = count($request->ca);
       
        for ($i=0; $i < $cantidadArticulos ; $i++) { 
            
            $facturas = new tbl_facturas();
            $facturas->num_factura= $request->num_factura;
            $facturas->descripcion=$request->descripcion;
            $facturas->fecha = $request->fecha;
            $facturas->tipo_factura = $request->tipo_factura;
            $facturas->cod_articulo = $request->ca[$i];
            $facturas->valor_unitario = $request->pu[$i];
            $facturas->cantidad = $request->vc[$i];
            $facturas->id_empresa = $request->nit_empresa;
            $facturas->id_user = $request->id_user;
            if($facturas->save()){
                echo $request->tipo_factura;
                echo "cod articulo ". $request->ca[$i];
                echo "valor uni ".  $request->pu[$i];
                echo "valor cantidad".$request->vc[$i];
            }else{
                echo "No se guardo el indice $i";
            }
        }

        $totalFactura= new $total();
        $totalFactura->num_factura = 'B133';
        $totalFactura->sub_total = $request->resultado_sub_total;
        $totalFactura->iva = $request->resultado_iva;
        $totalFactura->total = $request->resultado_total;
        $totalFactura->save();
        session()->flash('guardado', 'La Factura a sido Registrada con exito');
        return view('Facturas.facturas');

    }

    public function index()
    {
        $facturas = tbl_facturas::join('tbl_articulos as art', 'tbl_facturas.cod_articulo', '=', 'art.cod_articulo')
        ->join('users', 'tbl_facturas.id_user', '=', 'users.id')
        ->join('tbl_empresas as emp', 'tbl_facturas.id_empresa', '=', 'emp.id')
        ->select('tbl_facturas.*','art.nom_articulo','users.nom_user')
        ->get();
        // $facturas = tbl_facturas::join();
        return view('Facturas.facturas', compact('facturas'));
    }
    public function create()
    {
        $empresas_view = tbl_empresas::all();
        $usuarios_view = User::all();
        $articulos_view = tbl_articulos::all();
        return view('Facturas.registrar_factura', compact('empresas_view', 'usuarios_view', 'articulos_view'));
    }
    public function edit(tbl_facturas $factura)
    {
        $empresas = tbl_empresas::all();
        $usuarios = User::all();
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
        $usuarios = User::all();
        $articulos = tbl_articulos::all();
        return view('Facturas.editar_factura', compact('empresas', 'usuarios', 'articulos'));
    }
}
