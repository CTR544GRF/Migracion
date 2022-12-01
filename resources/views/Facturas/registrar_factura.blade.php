@extends('layouts.plantilla')

<!--estilo css -->
@section('estilos')
{{ asset('css/factura.css') }}
@stop

<!--link nav -->
@section('link')
{{ route('facturas.index') }}
@stop
<!-- palabra nav -->
@section('palabra-accion')
{{ 'Ver' }}
@stop
<!-- Script js -->

<!-- Titulo -->
@section('titulo')
{{ 'Registrar Factura' }}
@stop

@section('seccion')
<main class="formularios">
    <form action="{{ route('facturas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="seccion_uno">
            <h1>Registrar Factura</h1>
            <hr>
        </section>
        <section class="seccion_dos">
            <div id="seccion_two_left">
                <h3>Número de factura:</h3>
                <input type='text' name='num_factura' id="num_factura" required>
                <h4>Tipo de Factura:</h4>
                <select name="tipo_factura" id="Tipo_Factura" required>
                    <option value="">Seleccione tipo de factura</option>
                    <option value="compra">Factura de Compra</option>
                    <option value="venta">Factura de Venta</option>
                </select>
                <h4>Nit de Empresa:</h4>
                <select name="nit_empresa" id="">
                    <option value="">Selecione una empresa</option>
                    @foreach ($empresas_view as $empresa )
                    <option value="{{$empresa->nit_empresa}}"> {{$empresa->id}} - {{$empresa->nom_empresa}} - {{$empresa->rol}}</option>
                    @endforeach
                </select>
            </div>
            <div id="seccion_two_rigth">
                <h4>Fecha:</h4>
                <input type="date" name="fecha" id="fecha_factura" placeholder="Fecha" required>
                <h4>ID Usuario:</h4>
                <select name="id_user" id="id_user" required>
                    <option value="">Seleccione un Usuario</option>
                    @foreach ($usuarios_view as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->nom_user}}</option>
                    @endforeach
                </select>
            </div>
        </section>
        <div class="container_section_three">
            <section class=" form_factura_prueba seccion_tres">
                <div class="cajas">
                    <h3>#</h3>
                    <div class="tbl_abajo">
                        <span id="resultado_num_factura"></span>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Cod Artículo</h3>
                    <div class="tbl_abajo">
                        <select class="ca" name="ca[]" id="cod_articulo" required>
                            <option value="">Seleccione artículo</option>
                            @foreach ($articulos_view as $articulo)
                            <option value="{{$articulo->cod_articulo}}"> {{$articulo->cod_articulo}} - {{$articulo->nom_articulo}} -
                                {{$articulo->tipo_articulo}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Precio Unitario</h3>
                    <div class="tbl_abajo">
                        <span>$</span>
                        <input type="number" name="pu[]" onkeyup="totalArticulos()" class="pu" min="1" value="0" id="precio_unitario" required>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Cantidad</h3>
                    <div class="tbl_abajo">
                        <input type="number" name="vc[]" onkeyup="totalArticulos()" class="vc" min="1" value="0" id="valor_cantidad" required>
                    </div>
                </div>
                <div class="cajas" id="iva">
                    <h3>Iva</h3>
                    <div class="tbl_abajo">
                        <input type="number" name="vi[]" onkeyup="totalArticulos()" class="vi" id="valor_iva" min="1" value="0" max="100">
                        <span>%</span>
                    </div>
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
            </section>
        </div>


        <section class="seccion_cuatro">
            <div class="scs_cuatro_arriba">
                <div>
                    <textarea required name="descripcion" id="" cols="30" rows="10" placeholder="Dirección ..."></textarea>
                    {{-- <input type="text" id="Descripcion" name="descripcion" placeholder="Descripción ..."> --}}
                </div>
                <div class="total">
                    <div class="results">
                        <h3>Sub Total:</h3><input type='text' readonly name="resultado_sub_total" id="resultado_sub_total">
                    </div>
                    <div class="results">
                        <h3>iva: </h3>
                        <input type='text' readonly name='resultado_iva' id="resultado_iva">
                    </div>
                    <div class="results">
                        <h2>Total:</h2>
                        <input type='text' readonly name='resultado_total' id="resultado_total">
                    </div>


        </section>
        <div class="scs_cuatro_abajo">
            <button class="button" type="reset">
                <h3>Limpiar</h3>
            </button>
            <button class="button" type="submit" name="registrar">
                <h3>Registrar</h3>
            </button>
        </div>
    </form>
</main>

@if (session('guardado'))
<script>
    guardado('Registro Exitoso', '<?php echo session('guardado') ?>');
</script>
@endif
@if (session('error'))
<script>
    warning('Advertencia', '<?php echo session('error') ?>');
</script>
@endif
@if ($errors->any())
@foreach ($errors->all() as $message)
<script>
    error('Dato Erróneo]', '<?php echo $message ?>')
</script>
@endforeach
@endif

@section('script')
{{ asset('js/registro_factura.js') }}
@stop
@stop
