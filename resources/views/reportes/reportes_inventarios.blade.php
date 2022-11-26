@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Stock'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-producto-nuevo.png')}}" alt="inventarios">Reporte de inventario</h2>

    <a class="form_submit" href="{{route('rinventarios.print1')}}"><strong>Producto terminado</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print2')}}"><strong>Materia prima</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print3')}}"><strong>Insumos</strong></a>
    <a class="form_submit" href="{{route('rinventarios.print4')}}"><strong>Todos</strong></a>

   

</form>

@stop

