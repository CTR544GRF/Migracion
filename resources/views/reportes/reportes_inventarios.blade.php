@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('ver_reportes')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Volver'}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Stock'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-producto-nuevo.png')}}" alt="inventarios">Reporte de inventario</h2>

    <a class="form_submit" href="{{route('rinventarios.print1')}}" target="_blank"><strong>Producto terminado</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print2')}}" target="_blank"><strong>Materia prima</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print3')}}" target="_blank"><strong>Insumos</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print4')}}" target="_blank"><strong>Todos</strong></a>

   

</form>

@stop

