@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Empresas'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-cliente-de-empresa-60.png')}}" alt="usuarios">Reporte Empresas</h2>

    <a class="form_submit" href="{{route('rempresas.print1')}}" target="_blank"><strong> Clientes</strong></a>
    <a class="form_submit" href="{{route('rempresas.print2')}}" target="_blank"><strong> Proveedores</strong></a>
    <a class="form_submit" href="{{route('rempresas.print3')}}" target="_blank"><strong> Todos</strong></a>

   

</form>

@stop

