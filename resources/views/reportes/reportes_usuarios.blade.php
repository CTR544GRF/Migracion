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
{{ 'Reportes Usuarios'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-persona-de-sexo-masculino-64.png')}}" alt="usuarios">Reporte Usuarios</h2>

    <a class="form_submit" href="{{route('rusuarios',1)}}" target="_blank"><strong> Administradores</strong></a>
    <a class="form_submit" href="{{route('rusuarios',2)}}" target="_blank"><strong> Almacenistas</strong></a>
    <a class="form_submit" href="{{route('rusuarios',3)}}" target="_blank"><strong> Contadores</strong></a>
    <a class="form_submit" href="{{route('rusuarios',0)}}" target="_blank"><strong> Todos</strong></a>
   

</form>

@stop

