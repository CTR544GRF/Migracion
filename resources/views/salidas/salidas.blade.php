@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/tablas.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('salidas.create')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Registrar'}}
@stop


<!-- Titulo -->
@section('titulo')
{{ 'Salidas'}}
@stop

@section('seccion')
<div class="tabla">
    <div class="alingdownload">
        <div class="downloads">
            <button class="btn_download">
                <a href="{{route('salidas.csv')}}">
                    <span>CSV</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('salidas.xlsx')}}">
                    <span>EXCEL</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('salidas.pdf')}}">
                    <span>PDF</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('salidas.print')}}" target="_blank"><span>IMPRIMIR</span>
                </a>
            </button>
        </div>
        <input class="form" id="myInput" type="text" placeholder="Buscar ...">
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código registro</th>
                <th>Tipo registro</th>
                <th>Código artículo</th>
                <th>Descripción artículo</th>
                <th>Casual de entrada</th>
                <th>Número de factura</th>
                <th>Cantidad</th>
                <th>Fecha Salida</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($salidas as $salida)
            <tr>
                <td data-label="codigoE">{{$salida->cod_registro}}</td>
                <td data-label="tipo">{{$salida->tipo}}</td>
                <td data-label="codigoA">{{$salida->cod_articulo}}</td>
                <td data-label="descripcionA">{{$salida->descripcion_articulo}}</td>
                <td data-label="causal">{{$salida->causal}}</td>
                <td data-label="numeroF">{{$salida->num_factura}}</td>
                <td data-label="cantidad">{{$salida->cantidad}}</td>
                <td data-label="cantidad">{{$salida->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</div>
@stop
