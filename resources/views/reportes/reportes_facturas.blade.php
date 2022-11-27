@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Facturas'}}
@stop

@section('seccion')
<form class="registrar_usuario" action="{{route('report_factura')}}" enctype="multipart/form-data">
@csrf
<h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-invoices-60.png')}}" alt="facturas">Reporte Facturas</h2>
<div class="form_container">
    <div class="from_group">
        <h3>Desde:</h3>
    </div>
    <div class="from_group">
        <input type="date" id="fecha" class="from_input" placeholder="Fecha de ingreso" name="fechaDesde" required>
    </div>
    <div class="from_group">
        <h3>Hasta:</h3>
    </div>
    <div class="from_group">
        <input type="date" id="fecha" class="from_input" placeholder="Fecha de ingreso" name="fechaHasta" required>
    </div>
    <div class="from_group">
        <select name="tipo_factura" id="tipo_factura" required>
            <option selected>Seleccione tipo de factura</option>
            <option value="compra">Factura de Compra</option>
            <option value="venta">Factura de Venta</option>
        </select>
    </div>
    <button class="form_submit" type='submit' > Generar PDF </button>
   
</div>
</form>

@stop

