@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{asset('css/forms.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('empresas.index')}}
@stop
<!-- palabra nav -->
@section('palabra-accion')
{{'Ver'}}
@stop
<!--link nav2 -->
@section('link2')
{{ route('empresas.create')}}
@stop
<!-- palabra nav2 -->
@section('palabra-accion2')
{{'Registrar'}}
@stop
<!-- Titulo -->
@section('titulo')
{{ 'Editar Empresa'}}
@stop

@section('seccion')
<form class="registrar_usuario" action="{{route('empresas.update',$empresa->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form_container">
        <h2 class="form_titulo">Editar empresa</h2>
        <div class="from_group" style="display:none">
            <input type="text" id="id" class="from_input" placeholder=" " name="id" required maxlength="10" value="{{$empresa->id_empresa}}">
            <label for="tipo" class="from_label">ID</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" id="nit" class="from_input" placeholder=" " name="nit" required maxlength="10" value="{{$empresa->nit_empresa}}">
            <label for="tipo" class="from_label">NIT empresa</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" name="nombre" class="from_input" placeholder=" " value="{{$empresa->nom_empresa}}">
            <label for="tipo" class="from_label">Razón social</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" name="telefono" class="from_input" placeholder=" " value="{{$empresa->tel_empresa}}">
            <label for="tipo" class="from_label">Teléfono</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" name="direccion" class="from_input" placeholder=" " value="{{$empresa->direccion_empresa}}">
            <label for="tipo" class="from_label">Dirección</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="email" name="e_mail" class="from_input" placeholder=" " value="{{$empresa->email_empresa}}">
            <label for="tipo" class="from_label">E-mail</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="text" name="nombre" class="from_input" placeholder=" " value="{{$empresa->nombre}}">
            <label for="tipo" class="from_label">Nombre representante</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <select name="rol" class="from_group">
                <option value="{{$empresa->rol}}">{{$empresa->rol}}</option>
                <option value="Cliente">Cliente</option>
                <option value="Proveedor">Proveedor</option>
            </select>
        </div>
        <button name="registrar" type="submit" class="form_submit">Editar</button>
    </div>
</form>

@if (session('actualizado'))
<script>
    guardado('Actualización Exitosa', '<?php echo session('actualizado') ?>');
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
