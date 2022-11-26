@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes Usuarios'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo"><img class="mo" src="{{asset('img/icons8-persona-de-sexo-masculino-64.png')}}" alt="usuarios">Reporte Usuarios</h2>

    <a class="form_submit" href="{{route('rusuarios.print1')}}" target="_blank"><strong> Administradores</strong></a>
    <a class="form_submit" href="{{route('rusuarios.print2')}}" target="_blank"><strong> Almacenistas</strong></a>
    <a class="form_submit" href="{{route('rusuarios.print3')}}" target="_blank"><strong> Contadores</strong></a>
    <a class="form_submit" href="{{route('rusuarios.print4')}}" target="_blank"><strong> Todos</strong></a>
   

</form>

@stop

