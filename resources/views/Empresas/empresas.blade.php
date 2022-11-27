@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/tablas.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('empresas.create')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Registar'}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Empresas'}}
@stop

@section('seccion')
<div class="tabla">
    <div class="alingdownload">
        <div class="downloads">
            <button class="btn_download">
                <a href="{{route('empresas.csv')}}">
                    <span>CSV</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('empresas.xlsx')}}">
                    <span>EXCEL</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('empresas.pdf')}}">
                    <span>PDF</span>
                </a>
            </button>
            <button class="btn_download">
                <a href="{{route('empresas.print')}}" target="_blank"><span>IMPRIMIR</span>
                </a>
            </button>
        </div>
        <input class="form" id="myInput" type="text" placeholder="Buscar ...">
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIT</th>
                <th>Razón social</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>E-mail</th>
                <th>Nombre representante</th>
                <th>Rol</th>
                <!-- <th>Ciudad</th> -->
                <th>Editar</th>
                @can('admin.empresas.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($empresas as $empresa)
            <tr>
                <td data-label="Nit">
                    {{$empresa->nit_empresa}}
                </td>
                <td data-label="Nombre">
                    {{$empresa->nom_empresa}}
                </td>
                <td data-label="Teléfono">
                    {{$empresa->tel_empresa}}
                </td>
                <td data-label="Dirección">
                    {{$empresa->direccion_empresa}}
                </td>
                <td data-label="E-mail">
                    {{$empresa->email_empresa}}
                </td>
                <td data-label="Id User">
                    {{$empresa->nombre}}
                </td>
                <td data-label="rol ">
                    {{$empresa->rol}}
                </td>
                <td data-label="Editar"><a href="{{ route('empresas.edit', $empresa) }}"><i class="bi bi-pencil-square"></i></a> </td>
                @can('admin.empresas.destroy')
                <form action="{{route('empresas.destroy',$empresa)}}" method="POST" class="eliminar_datos">
                    @csrf
                    @method('DELETE')
                    <td class="eliminartd" data-label="">
                        <button class="btn_eliminar" type="submit">
                            <i class="bi bi-archive-fill"></i>
                        </button>
                    </td>
                </form>
                @endcan
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
@if (session('actualizado'))
<script>
    guardado('Actualización Exitosa', '<?php echo session('actualizado') ?>');
</script>
@endif

@if (session('error'))
<script>
    error('Advertencia', '<?php echo session('error') ?>');
</script>
@endif


@section('script')
{{ asset('js/eliminar.js')}}
@stop
<!-- Mesajes de confirmacion y error -->
@if (session('destroy'))
<script>
    guardado('Eliminación Exitosa', '<?php echo session('destroy') ?>');
</script>
@endif

@if ($errors->any())
@foreach ($errors->all() as $message)
<script>
    error('Dato Erróneo', '<?php echo $message ?>')
</script>
@endforeach
@endif

@stop
