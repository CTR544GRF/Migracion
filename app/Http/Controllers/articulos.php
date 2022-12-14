<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_articulos;
use Barryvdh\DomPDF\Facade\Pdf;

class articulos extends Controller
{
    public function create()
    {
        return view('Articulos.registrar_articulo');
    }

    public function exportPdf()
    {
        $articulos = tbl_articulos::get();
        $pdf = PDF::loadView('pdf.articulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->download('articulos.pdf');
    }
    public function printPdf()
    {
        $articulos = tbl_articulos::get();
        $pdf = PDF::loadView('pdf.articulos', compact('articulos'))->setPaper('a4', 'landscape');
        return $pdf->stream('articulos.pdf');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|min:4|max:20|string',
            'nombre' => 'required|min:4|max:20|string',
            'material' => 'required|min:4|max:20|alpha',
            'talla' => 'required|max:20',
            'linea' => 'required|min:1|max:10|string',
            'uMedida' => 'required|min:4|max:15|alpha',
            'color' => 'required|min:4|max:10|alpha',
            'descripcion' => 'max:150|string|required'
        ]);
        $articulos = new tbl_articulos;
        $articulos->tipo_articulo = $request->tipo;
        $articulos->nom_articulo = $request->nombre;
        $articulos->material_articulo = $request->material;
        $articulos->talla_articulo = $request->talla;
        $articulos->linea = $request->linea;
        $articulos->unidad_medida = $request->uMedida;
        $articulos->color_articulo = $request->color;
        $articulos->descripcion_articulo = $request->descripcion;
        $articulos->save();

        return redirect()->route('articulos.create')->with('guardado', 'El Artículo ha sido guardado con exito');
    }
    public function index()
    {
        $articulos_view = tbl_articulos::all();
        return view('Articulos.articulos', compact('articulos_view'));
    }

    public function edit(tbl_articulos $articulo)
    {
        return view('Articulos.editar_articulo', compact('articulo'));
    }
    public function update(Request $request, tbl_articulos $articulo)
    {
        $request->validate([
            'tipo' => 'required|min:4|max:20|string',
            'nombre' => 'required|min:4|max:20|string',
            'material' => 'required|min:4|max:20|alpha',
            'talla' => 'required|max:20',
            'linea' => 'required|min:1|max:10|string',
            'uMedida' => 'required|min:4|max:15|alpha',
            'color' => 'required|min:4|max:10|alpha',
            'descripcion' => 'max:150|string|required'
        ]);

        $articulo->tipo_articulo = $request->tipo;
        $articulo->nom_articulo = $request->nombre;
        $articulo->material_articulo = $request->material;
        $articulo->talla_articulo = $request->talla;
        $articulo->linea = $request->linea;
        $articulo->unidad_medida = $request->uMedida;
        $articulo->color_articulo = $request->color;
        $articulo->descripcion_articulo = $request->descripcion;
        $articulo->save();
        session()->flash('actualizado', 'El Artículo ha sido editado con exito');
        return view('Articulos.editar_articulo', compact('articulo'));
    }
    public function destroy(tbl_articulos $articulo)
    {
        $articulo->delete();

        return back()->with('destroy', 'El Artículo ha sido eliminado correctamente');
    }
}
