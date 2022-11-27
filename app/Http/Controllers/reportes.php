<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_usuarios;
use App\Models\tbl_empresas;
use App\Models\tbl_articulos;
use App\Models\tbl_facturas;
use App\Models\tbl_totalfactura;
use App\Models\tbl_inventarios;
use Barryvdh\DomPDF\Facade\Pdf;


class reportes extends Controller
{

    //Usuarios
    public function printPdf($id)
    {   
        if ($id == 0 ){
            $count = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')->count();
            $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
                ->select('users.*', 'r.name')->orderBy('id', 'asc')->get();
        }else{
            $count = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')->where('cod_rol', '=', $id)->count();
            $usuarios = tbl_usuarios::leftJoin('roles as r', 'users.cod_rol', '=', 'r.id')
            ->select('users.*', 'r.name')->orderBy('id', 'asc')
            ->where('cod_rol', '=', $id)
            ->get();
        }
        
        $pdf = PDF::loadView('reportes.rusuarios', compact('usuarios','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rusuarios.pdf');
    }

   

    //Empresas
    public function printPdfEmpresas1()
    {   
        $count = tbl_empresas::where('rol', '=', 'Cliente')->count();
        $empresas = tbl_empresas::where('rol', '=', 'Cliente')->get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    public function printPdfEmpresas2()
    {   
        $count = tbl_empresas::where('rol', '=', 'Proveedor')->count();
        $empresas = tbl_empresas::where('rol', '=', 'Proveedor')->get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    public function printPdfEmpresas3()
    {   
        $count = tbl_empresas::count();
        $empresas = tbl_empresas::get();
        $pdf = PDF::loadView('reportes.rempresas', compact('empresas','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rempresas.pdf');
    }

    //articulos

    public function printPdfArticulos1()
    {   
        $count = tbl_articulos::where('tipo_articulo', '=', 'Producto terminado')
            ->count();
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Producto terminado')
            ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos2()
    {   
        $count = tbl_articulos::where('tipo_articulo', '=', 'Materia prima')
            ->count();
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Materia prima')
            ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos3()
    {   
        $count = tbl_articulos::where('tipo_articulo', '=', 'Insumo')
            ->count();
        $articulos = tbl_articulos::where('tipo_articulo', '=', 'Insumo')
            ->get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }

    public function printPdfArticulos4()
    {   
        $count = tbl_articulos::count();
        $articulos = tbl_articulos::get();
        $pdf = PDF::loadView('reportes.rarticulos', compact('articulos','count'))->setPaper('a4', 'landscape');
        return $pdf->stream('rarticulos.pdf');
    }


    //stock

    public function printPdfInventarios1()
    {   

        $sum = tbl_inventarios::where('tipo_articulo', '=', 'Producto terminado')
            ->sum('existencias');
        $count = tbl_inventarios::where('tipo_articulo', '=', 'Producto terminado')
            ->count();
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Producto terminado')
            ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios','count','sum'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios2()
    {   
        $sum = tbl_inventarios::where('tipo_articulo', '=', 'Materia prima')
            ->sum('existencias');
        $count = tbl_inventarios::where('tipo_articulo', '=', 'Materia prima')
            ->count();
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Materia prima')
            ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios','count','sum'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios3()
    {   
        $sum = tbl_inventarios::where('tipo_articulo', '=', 'Insumo')
            ->sum('existencias');
        $count = tbl_inventarios::where('tipo_articulo', '=', 'Insumo')
            ->count();
        $inventarios = tbl_inventarios::where('tipo_articulo', '=', 'Insumo')
            ->get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios','count','sum'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }

    public function printPdfInventarios4()
    {   
        $sum = tbl_inventarios::sum('existencias');
        $count = tbl_inventarios::count();
        $inventarios = tbl_inventarios::get();
        $pdf = PDF::loadView('reportes.rinventarios', compact('inventarios','count','sum'))->setPaper('a4', 'landscape');
        return $pdf->stream('rinventarios.pdf');
    }




    public function printPdffactura($num_factura)
    {

        $facturas = tbl_facturas::leftJoin('tbl_totalfacturas as tl', 'tbl_facturas.num_factura', '=', 'tl.num_factura')
            ->leftJoin('tbl_articulos as A', 'tbl_facturas.cod_articulo', '=', 'A.cod_articulo')
            ->leftJoin('users as U', 'tbl_facturas.id_user', '=', 'U.id')
            ->leftJoin('tbl_empresas as emp', 'tbl_facturas.id_empresa', '=', 'emp.id')
            ->select(
                'tbl_facturas.*',
                'emp.direccion_empresa',
                'emp.nom_empresa',
                'emp.nombre as representante',
                'emp.email_empresa',
                'U.cedula',
                'U.nom_user',
                'tl.*'
            )
            ->where('tl.num_factura', '=', $num_factura)
            ->get();

        $pdf = PDF::loadView('Facturas.facturaPDF', compact('facturas'))->setPaper('a4', 'landscape');
        return $pdf->stream('facturaPDF.pdf');
    }

    function reportFactura(Request $request,tbl_facturas $facturas)
    {
        $reportes = $facturas::leftJoin('tbl_totalfacturas as tl', 'tbl_facturas.num_factura', '=', 'tl.num_factura')
        ->select(
            'fecha',
            'tl.*'
        )->whereBetween('fecha', [$request->fechaDesde, $request->fechaHasta])->where('tipo_factura','=',$request->tipo_factura)->distinct()->get();

        $count = tbl_totalfactura::leftJoin('tbl_facturas as tl', 'tbl_totalfacturas.num_factura', '=', 'tl.num_factura')
        ->select(
            'fecha',
            'tl.*'
        )->whereBetween('fecha', [$request->fechaDesde, $request->fechaHasta])->where('tipo_factura','=',$request->tipo_factura)->distinct()->count();
        
        $contador = 1 ;
        $sumSubtotal = $facturas::leftJoin('tbl_totalfacturas as tl', 'tbl_facturas.num_factura', '=', 'tl.num_factura')->whereBetween('fecha', [$request->fechaDesde, $request->fechaHasta])->where('tipo_factura','=',$request->tipo_factura)->distinct()->sum('sub_total');
        $sumIva = $facturas::leftJoin('tbl_totalfacturas as tl', 'tbl_facturas.num_factura', '=', 'tl.num_factura')->whereBetween('fecha', [$request->fechaDesde, $request->fechaHasta])->where('tipo_factura','=',$request->tipo_factura)->distinct()->sum('iva');
        $sumTotal = $facturas::leftJoin('tbl_totalfacturas as tl', 'tbl_facturas.num_factura', '=', 'tl.num_factura')->whereBetween('fecha', [$request->fechaDesde, $request->fechaHasta])->where('tipo_factura','=',$request->tipo_factura)->distinct()->sum('total');

        $pdf = PDF::loadView('reportes.rfacturas', compact('reportes','count','sumSubtotal','sumIva','sumTotal','contador'))->setPaper('a4', 'landscape');
        return $pdf->stream('factura.pdf');

        var_dump("<pre>".$reportes."</pre>");
    }
}
