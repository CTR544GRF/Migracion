<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tbl_articulos;
use App\Models\tbl_facturas;
use App\Models\tbl_registros;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class salidas extends Controller
{
    public function exportPdf()
    {
        $salidas = tbl_registros::leftJoin('tbl_articulos as a', 'tbl_registros.cod_articulo', '=', 'a.cod_articulo')
            ->select('tbl_registros.*', 'descripcion_articulo')
            ->where('tipo', '=', 'Salida')->get();
        $pdf = PDF::loadView('pdf.salidas', compact('salidas'))->setPaper('a4', 'landscape');
        return $pdf->download('salidas.pdf');
    }
    public function printPdf()
    {
        $salidas = tbl_registros::leftJoin('tbl_articulos as a', 'tbl_registros.cod_articulo', '=', 'a.cod_articulo')
            ->select('tbl_registros.*', 'descripcion_articulo')
            ->where('tipo', '=', 'Salida')->get();
        $pdf = PDF::loadView('pdf.salidas', compact('salidas'))->setPaper('a4', 'landscape');
        return $pdf->stream('salidas.pdf');
    }
    public function store(Request $request)
    {
        /* El validate funciona, pero los datos que se estan enviando no cumplen    */
        $request->validate([
            'ca' => 'required|max:10',
            'tipo' => 'max:30',
            'vc' => 'required|max:20',
            'causal' => 'required|max:50',
            'num_factura' => 'max:50',
        ]);

        if ($request->causal == "Factura de venta - producto" && $request->num_factura == "Seleccione una factura") {
            return redirect()->route('salidas.create')->with('error', 'Debe seleccionar un numero de factura');
        } elseif ($request->causal == "Factura de venta - producto" && is_null($request->num_factura)) {
            return redirect()->route('salidas.create')->with('error', 'Debe seleccionar un numero de factura');
        }

        if ($request->num_factura == "Seleccione una factura") {
            return redirect()->route('salidas.create')->with('error', 'Dejo algún campo sin seleccionar');
        }

        $count = 0;

        for ($i=0; $i < count($request->ca) ; $i++) { 
            $entradas = new tbl_registros();
            $entradas->cod_articulo = $request->ca[$i];
            $entradas->tipo = "Salida";
            $entradas->cantidad = $request->vc[$i];
            $entradas->causal = $request->causal;
            $entradas->num_factura = $request->num_factura;
            if($this->updateOrInsertInventory($request->ca[$i], $request->vc[$i])){
                $entradas->save();
            $count++;
            }else{
                return redirect()->route('salidas.create')->with('error', 'No se puede ingresar una salida mayor a la cantidad actual en inventario');
            }
        }

        if ($count>0) :
            return redirect()->route('salidas.create')->with('guardado', 'El registro de entrada se realizó con exito');
        endif;
    }

    public function index()
    {
        $salidas = tbl_registros::leftJoin('tbl_articulos as a', 'tbl_registros.cod_articulo', '=', 'a.cod_articulo')
            ->select('tbl_registros.*', 'descripcion_articulo')
            ->where('tipo', '=', 'Salida')->get();
        return view('salidas.salidas', compact('salidas'));
    }

    public function create()
    {
        $articulos = tbl_articulos::all();
        $facturas = tbl_facturas::all();
        return view('salidas.registrar_salida', compact('articulos', 'facturas'));
    }
    private function updateOrInsertInventory($id, $cantidadEntrada)
    {   //Valida si ya existe un registro en inventario
        $bool = DB::table('tbl_inventarios')
            ->where('cod_articulo', $id)->exists();
        //Si el articulo ya existe en el inventario lo actualiza
        if ($bool) :
            //Selecciona la cantidad actual de un articulo
            $cantidadActual =  DB::table('tbl_inventarios')
                ->select('existencias')
                ->where('cod_articulo', '=', $id)->get();
            //Resta la cantidad actual del inventario con la cantidad que se está registrando en la entrada
            $total = round($cantidadActual[0]->existencias) - round($cantidadEntrada);
            //Si la resta es mayor o igual a cero se actualiza, sino retorna false
            if ($total >= 0) {
                DB::table('tbl_inventarios')->where('cod_articulo', $id)
                    ->update(['existencias' => $total]);
                return ["cantidad entrada" => $cantidadEntrada, "Cantidad Actual" => $cantidadActual[0]->existencias];
            } else {
                $total = 0;
                return false;
            }

        endif;
    }
}
