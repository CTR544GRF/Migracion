@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/forms.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('articulos.index')}}
@stop
<!-- palabra nav -->
@section('palabra-accion')
{{'Ver'}}
@stop
<!-- Titulo -->
@section('titulo')
{{ 'Registrar Articulo'}}
@stop

@section('seccion')

<form class="registrar_usuario" action="{{route('articulos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form_container">
        <h2 class="form_titulo">Registrar artículo</h2>
        <div class="from_group">
            <select name="tipo" id="tipo" required>
                <option value="">Seleccione la categoría del artículo</option>
                <option value="Producto terminado">Producto terminado</option>
                <option value="Materia prima">Materia prima</option>
                <option value="Insumo">Insumo</option>
            </select>
        </div>
        <div class="from_group">
            <input type="text" id="Nombre" class="from_input" placeholder=" " name="nombre" required>
            <label for="tipo" class="from_label">Nombre</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" id="material" class="from_input" placeholder=" " name="material" required>
            <label for="tipo" class="from_label">Material</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <select name="linea" id="linea" required>
                <option value="">Seleccione línea del producto</option>
                <option value="No">No aplica</option>
                <option value="Adulto">Adulto</option>
                <option value="Niño">Niño</option>
            </select>
        </div>
        <div class="from_group">
            <select name="talla" id="talla" required>
                <option value="">Seleccione talla del producto</option>
                <option value="No">No aplica</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="2XL">2XL</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="14">14</option>
                <option value="16">16</option>
            </select>
        </div>
        <div class="from_group">
            <select name="uMedida" id="uMedida" required>
                <option value="">Seleccione unidad de medida</option>
                <option value="Unidad">Unidad</option>
                <option value="Centímetros">Centímetros</option>
                <option value="Metros">Metros</option>
            </select>
        </div>
        <div class="from_group">
            <input type="text" id="Color" class="from_input" placeholder=" " name="color" required>
            <label for="tipo" class="from_label">Color</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" id="descripción" class="from_input" placeholder=" " name="descripcion" required>
            <label for="tipo" class="from_label">Descripción</label>
            <span class="from_line"></span>
        </div>
        <button type="submit" class="form_submit" name="registrarArt">Registrar</button>
    </div>
</form>
@if (session('guardado'))
<script>
    guardado('Registro Exitoso', '<?php echo session('guardado') ?>');
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
