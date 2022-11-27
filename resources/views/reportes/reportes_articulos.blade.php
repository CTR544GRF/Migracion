@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Articulos'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-suéter.png')}}" alt="articulos">Reporte Artículos</h2>

    <a class="form_submit" href="{{route('rarticulos.print1')}}" target="_blank"><strong>Producto terminado</strong></a>
    <a class="form_submit" href="{{route('rarticulos.print2')}}" target="_blank"><strong>Materia prima</strong></a>
    <a class="form_submit" href="{{route('rarticulos.print3')}}" target="_blank"><strong>Insumos</strong></a>
    <a class="form_submit" href="{{route('rarticulos.print4')}}" target="_blank"><strong>Todos</strong></a>

   

</form>

@stop

