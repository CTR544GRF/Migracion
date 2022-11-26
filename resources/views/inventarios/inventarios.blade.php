@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/tablas.css')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Inventario'}}
@stop

@section('seccion')
<div class="tabla">
    <div class="alingdownload">
        <div class="downloads">
            <button class="btn_download">
                <a href="{{route('inventarios.csv')}}">
                    <span>CSV</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('inventarios.xlsx')}}">
                    <span>EXCEL</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('inventarios.pdf')}}">
                    <span>PDF</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('inventarios.print')}}" target="_blank"><span>IMPRIMIR</span>
                </a>
            </button>
        </div>
        <input class="form" id="myInput" type="text" placeholder="Buscar ...">
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Codigo articulo</th>
                <th>Categoria articulo</th>
                <th>Descripcion articulo</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($inventario as $inventario)
            <tr>

                <td data-label="codA">
                    {{$inventario->cod_articulo}}
                </td>
                <td data-label="tipo">
                    {{$inventario->tipo_articulo}}
                </td>
                <td data-label="descripcionA">
                    {{$inventario->descripcion_articulo}}
                </td>
                <td data-label="existencias">
                    {{$inventario->existencias}}
                </td>
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
