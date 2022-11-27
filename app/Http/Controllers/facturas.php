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

    private $prueba = [];

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

    public function printFactura()
    {
        $facturas = tbl_empresas::all();
        $pdf = PDF::loadView('pdf.facturas', compact('facturas'))->setPaper('a4', 'landscape');
    }

    public function store(Request $request, tbl_totalfactura $total)
    {

        $cantidadArticulos = count($request->ca);

        for ($i = 0; $i < $cantidadArticulos; $i++) {

            $facturas = new tbl_facturas();
            $facturas->num_factura = $request->num_factura;
            $facturas->descripcion = $request->descripcion;
            $facturas->fecha = $request->fecha;
            $facturas->tipo_factura = $request->tipo_factura;
            $facturas->cod_articulo = $request->ca[$i];
            $facturas->valor_unitario = $request->pu[$i];
            $facturas->cantidad = $request->vc[$i];
            $facturas->iva_producto = $request->vi[$i];
            $facturas->id_empresa = $request->nit_empresa;
            $facturas->id_user = $request->id_user;
            $facturas->save();
        }

        $totalFactura = new $total();
        $totalFactura->num_factura = $request->num_factura;
        $totalFactura->sub_total = $request->resultado_sub_total;
        $totalFactura->iva = $request->resultado_iva;
        $totalFactura->total = $request->resultado_total;
        $totalFactura->save();

        $facturas = tbl_facturas::leftJoin('tbl_totalfacturas as ar', 'tbl_facturas.num_factura', '=', 'ar.num_factura')
            ->leftJoin('tbl_articulos as art', 'tbl_facturas.cod_articulo', '=', 'art.cod_articulo')
            ->leftJoin('users', 'tbl_facturas.id_user', '=', 'users.id')
            ->leftJoin('tbl_empresas as emp', 'tbl_facturas.id_empresa', '=', 'emp.id')
            ->select('tbl_facturas.*', 'ar.iva', 'ar.sub_total', 'ar.total', 'art.nom_articulo', 'users.nom_user')
            ->get();
        // $facturas = tbl_facturas::join();
        session()->flash('guardado', 'La Factura a sido Registrada con exito');
        return redirect()->route('facturas.create');
    }

    public function index()
    {
        $facturas = tbl_facturas::leftJoin('tbl_totalfacturas as ar', 'tbl_facturas.num_factura', '=', 'ar.num_factura')
            ->leftJoin('tbl_articulos as art', 'tbl_facturas.cod_articulo', '=', 'art.cod_articulo')
            ->leftJoin('users', 'tbl_facturas.id_user', '=', 'users.id')
            ->leftJoin('tbl_empresas as emp', 'tbl_facturas.id_empresa', '=', 'emp.id')
            ->select('tbl_facturas.*', 'ar.iva', 'ar.sub_total', 'ar.total', 'art.nom_articulo', 'users.nom_user')
            ->get();
        // $facturas = tbl_facturas::join();
        return view('Facturas.facturas', compact('facturas'));
        /*  $this->prueba = [3,2]; 
        $users = DB::table('users')->orWhere(function($query) {
                for ($i=0; $i <count($this->prueba) ; $i++) { 
                    $query->orWhere('id','=',$this->prueba[$i]);
                }
            })->orderby('id','asc')->get();
        var_dump( $users); */
    }
    public function create()
    {
        $empresas_view = tbl_empresas::all();
        $usuarios_view = User::all();
        $articulos_view = tbl_articulos::all();
        return view('Facturas.registrar_factura', compact('empresas_view', 'usuarios_view', 'articulos_view'));
    }
    public function edit(tbl_facturas $facturas, Request $request)
    {
        $factura = $facturas::select('*')->where('num_factura', '=', $request->factura)->get();
        $empresas = tbl_empresas::all();
        $usuarios = User::all();
        $articulos_view = tbl_articulos::all();
        $total_factura = tbl_totalfactura::all()->where('num_factura', '=', $request->factura);
        return view('Facturas.editar_factura', compact('factura', 'empresas', 'usuarios', 'articulos_view', 'total_factura'));
    }

    public function update(Request $request, tbl_facturas $facturas, tbl_totalfactura $total)
    {

        $cantidadArticulos = count($request->ca);

        
        for ($i = 0; $i < $cantidadArticulos; $i++) {
            $affected = $facturas::where('id', $request->id[$i])
                ->update(['tipo_factura' => $request->tipo_factura, 'cod_articulo' => $request->ca[$i], 'valor_unitario' => $request->pu[$i], 'cantidad' => $request->vc[$i],'iva_producto' => $request->vi[$i] ,'id_empresa' => $request->id_empresa, 'id_user' => $request->id_user, 'descripcion' => $request->descripcion, 'fecha' => $request->fecha]);
           
        }
        
        $total::where('num_factura','=',$request->num_factura)
              ->update(['sub_total' =>$request->resultado_sub_total,'iva' =>  $request->resultado_iva,'total' => $request->resultado_total]);
        

        $facturas = tbl_facturas::leftJoin('tbl_totalfacturas as ar', 'tbl_facturas.num_factura', '=', 'ar.num_factura')
            ->leftJoin('tbl_articulos as art', 'tbl_facturas.cod_articulo', '=', 'art.cod_articulo')
            ->leftJoin('users', 'tbl_facturas.id_user', '=', 'users.id')
            ->leftJoin('tbl_empresas as emp', 'tbl_facturas.id_empresa', '=', 'emp.id')
            ->select('tbl_facturas.*', 'ar.iva', 'ar.sub_total', 'ar.total', 'art.nom_articulo', 'users.nom_user')
            ->get();
        // $facturas = tbl_facturas::join();
        session()->flash('guardado', 'La Factura ha sido registrada con exito');
        return redirect()->route('facturas.create');
    }
}
