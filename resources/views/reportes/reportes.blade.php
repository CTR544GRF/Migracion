@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/reportes.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Reportes'}}
@stop

@section('seccion')
<form class="registrar_usuario" enctype="multipart/form-data">
@csrf
    <h2 class="form_titulo">Reportes</h2>

    <a class="form_submit" href="{{route('pdf_usuarios')}}"><img class="img" src="{{asset('img/icons8-persona-de-sexo-masculino-64.png')}}" alt="usuarios"><strong> Usuarios</strong></a>
    <a class="form_submit" href="{{route('pdf_empresas')}}"><img class="img" src="{{asset('img/icons8-cliente-de-empresa-60.png')}}" alt="usuarios"><strong> Empresas</strong></a>
    <a class="form_submit" href="{{route('pdf_facturas')}}"><img class="img" src="{{asset('img/icons8-invoices-60.png')}}" alt="facturas"><strong> Facturas</strong></a>
    <a class="form_submit" href="{{route('pdf_articulos')}}"><img class="img" src="{{asset('img/icons8-suéter.png')}}" alt="articulos"><strong> Artículos</strong></a>
    <a class="form_submit" href="{{route('pdf_stock')}}"><img class="img" src="{{asset('img/icons8-producto-nuevo.png')}}" alt="inventarios"><strong> Stock</strong></a>

</form>

@stop

