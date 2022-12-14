@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/ver_factura.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('facturas.create')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Registrar'}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Facturas'}}
@stop

@section('seccion')
<div class="tabla">
    <div class="alingdownload">
        <div class="downloads">
            <button class="btn_download">
                <a href="{{route('facturas.csv')}}">
                    <span>CSV</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('facturas.xlsx')}}">
                    <span>EXCEL</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('facturas.pdf')}}">
                    <span>PDF</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('facturas.print')}}" target="_blank"><span>IMPRIMIR</span>
                </a>
            </button>
        </div>
        <input class="form" id="myInput" type="text" placeholder="Buscar ...">
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th># Factura</th>
                <th>Tipo de factura</th>
                <th>Código artículo</th>
                <th>Valor unitario</th>
                <th>Cantidad</th>
                <th>Descripción</th>
                <th>Nit</th>
                <th>Id usuario</th>
                <th>Sub total</th>
                <th>iva</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Editar</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tbody id="myTable">
           
            @foreach ($facturas as $factura )
            <tr>
                <td data-label="Nu.factura">{{ $factura->id }}</td>
                <td data-label="Nu.factura">{{ $factura->num_factura }}</td>
                <td data-label="Tipo de factura">{{ $factura->tipo_factura }}</td>
                <td data-label="Codigo articulo">{{ $factura->cod_articulo }}</td>
                <td data-label="Valor unitario">{{ $factura->valor_unitario}}</td>
                <td data-label="cantidad">{{ $factura->cantidad}}</td>
                <td data-label="Descripción">{{ $factura->descripcion }}</td>
                <td data-label="Nit">{{$factura->id_empresa }}</td>
                <td data-label="Id usuario">{{ $factura->id_user}}</td>
                <td data-label="Sub total">{{ $factura->sub_total }}</td>
                <td data-label="iva">{{ $factura->iva }}</td>
                <td data-label="Total">{{ $factura->total }}</td>
                <td data-label="Fecha">{{ $factura->fecha }}</td>
                <td data-label="Editar"><a href="{{ route('facturas.edit', $factura->num_factura) }}"><i class="bi bi-pencil-square"></i></a> </td>
                <td>
                    <a href="{{ route('factura_reporte',$factura->num_factura) }}" target="_blank">
                        <svg class="svg" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                        </svg>
                    </a>
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

<!-- Script js -->
@section('script')
{{ asset('js/eliminar.js')}}
@stop
<!-- Mesajes de confirmacion y error -->

@if (session('destroy'))
<script>
    guardado('Eliminacion Exitosa', '<?php echo session('destroy') ?>');
</script>
@endif

@if (session('actualizado'))
<script>
    guardado('Actualizacion Exitosa', '<?php echo session('actualizado') ?>');
</script>
@endif

@if ($errors->any())
@foreach ($errors->all() as $message)
<script>
    error('Dato Errado', '<?php echo $message ?>')
</script>
@endforeach
@endif

@stop
