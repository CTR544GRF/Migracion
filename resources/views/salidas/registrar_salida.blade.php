@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/forms.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('salidas.index')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Ver'}}
@stop


<!-- Titulo -->
@section('titulo')
{{ 'Registrar salida'}}
@stop

@section('seccion')
<form class="registrar_usuario" action="{{route('salidas.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2 class="form_titulo">Registrar salida</h2>
    <div class="form_container">
        <div class="from_group">
            <select name="causal" id="causal">
                <option selected>Causal salida</option>
                <option value="Factura de venta - producto">Factura de venta - Producto</option>
                <option value="No conforme - producto">No conforme - Producto</option>
                <option value="Confección Satelite - materia prima">Confección Satelite - Materia prima</option>
                <option value="Baja - materia prima">Baja - Materia prima</option>
                <option value="Baja - insumo">Baja - Insumo</option>
            </select>
        </div>
        <div class="from_group">
            <select name="num_factura" class="from_group">
                <option selected>Seleccione una factura</option>
                <option value="">No aplica</option>
                @foreach ($facturas as $factura)
                <option value="{{$factura->num_factura}}">{{$factura->num_factura}} - {{$factura->tipo_factura}} Cantidad: {{$factura->cantidad}} </option>
                @endforeach
            </select>
        </div>
        <div class="from_group container_entrada">
            <div class="form_factura_prueba" id="container_id">
                <div>
                    <select name="ca[]" class="from_group">
                        <option value=""><button href="{{route('articulos.create')}}"><a>Seleccione un artículo</a></button></option>
                        @foreach ($articulos as $articulo)
                        <option value="{{$articulo->cod_articulo}}">{{$articulo->cod_articulo }} - {{$articulo->nom_articulo}} - {{$articulo->color_articulo}} - {{$articulo->tipo_articulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="cantidad">
                    <label class="l-canditad" for="tipo" class="from_label">Cantidad</label>
                    <input type="number" class="from_input" placeholder=" " name="vc[]" required maxlength="10" minlength="10">
                    <span class="from_line"></span>
                </div>
                <div onclick="itemCreate()" class="cajas">
                    <!-- <h3>Agregar</h3> -->
                    <div class="tbl_abajo">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                </div>
                <div onclick="borrar()" class="cajas">
                    <div class="tbl_abajo">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Registrar" class="form_submit" class="gap" name="Registrar">
        <input type="reset" value="Limpiar" class="form_submit" class="gap" name="Limpiar">

    </div>
</form>
@if (session('guardado'))
<script>
    guardado('Registro Exitoso', '<?php echo session('guardado') ?>');
</script>
@endif
@if (session('error'))
<script>
    error('Advertencia', '<?php echo session('error') ?>');
</script>
@endif

@if (session('error'))
<script>
    error('Dato Erróneo', '<?php echo session('error') ?>');
</script>
@endif

@if ($errors->any())
@foreach ($errors->all() as $message)
<script>
    error('Dato Erróneo', 'Dejo algún campo sin seleccionar')
</script>
@endforeach

@endif
@section('script')
{{ asset('js/registro_factura.js') }}
@stop

@stop
