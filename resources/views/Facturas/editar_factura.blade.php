@extends('layouts.plantilla')
<!--estilo css -->
@section('estilos')
{{asset('css/factura.css')}}
@stop

<!--link nav -->
@section('link')
{{ route('facturas.index')}}
@stop

<!-- palabra nav -->
@section('palabra-accion')
{{'Ver'}}
@stop

<!--link nav2 -->
@section('link2')
{{ route('facturas.create')}}
@stop

<!-- palabra nav2 -->
@section('palabra-accion2')
{{'Registrar'}}
@stop

<!-- Script js -->
@section('script')
{{ asset('js/registro_factura.js')}}
@stop

<!-- Titulo -->
@section('titulo')
{{ 'Editar Factura'}}
@stop

@section('seccion')
<main class="formularios">
    <form action="{{route('facturas.update',$factura[0]->num_factura)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <section class="seccion_uno">
            <button class="crear_factura" type="reset">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                </svg>
                <h1> Editar Factura</h1>
            </button>
            <hr>
        </section>
        <section class="seccion_dos">
            <div id="seccion_two_left">
                <h3>Número de Factura:</h3>
                <input type="text" placeholder="Nu. Factura" name="num_factura" id="num_factura" value="{{$factura[0]->num_factura}}" readonly required>
                <h4>Tipo de Factura:</h4>
                <select name="tipo_factura" id="Tipo_Factura" required>
                    <option value='{{$factura[0]->tipo_factura}}'> {{$factura[0]->tipo_factura}}</option>
                    <option value='venta'>Factura de Venta</option>
                    <option value='compra'>Factura de Compra</option>   
                </select>
                <h4>NIT de Empresa:</h4>
                <select readonly name="id_empresa" required>
                    <option selected="true" value="{{$factura[0]->id_empresa}}" >{{$factura[0]->id_empresa}}</option>
                </select>
            </div>
            <div id="seccion_two_rigth">
                <h4>Fecha:</h4>
                <input type="date" name="fecha" id="fecha_factura" placeholder="Fecha" value="{{$factura[0]->fecha}}" required>
                <h4>Id Usuario:</h4>
                <select name="id_user" id="id_user" required>
                    <option value="{{$factura[0]->id_user}}">{{$factura[0]->id_user}}</option>
                    @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->nom_user}}</option>
                    @endforeach
                </select>
            </div>
        </section>
        <div class="container_section_three">
            @foreach ($factura as $item)
            <section class=" form_factura_prueba seccion_tres">
                <div class="cajas">
                    <h3>ID:</h3> <input class="input_id" type='text' name="id[]" readonly value="{{$item->id}}">
                    <div class="tbl_abajo">
                        <span id="resultado_num_factura"></span>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Cod Artículo</h3>
                    <div class="tbl_abajo">
                        <select class="ca" name="ca[]" id="cod_articulo" required>
                            <option value="{{$item->cod_articulo}}">{{$item->cod_articulo}}</option>
                            @foreach ($articulos_view as $articulo)
                            <option value="{{$articulo->cod_articulo}}"> {{$articulo->cod_articulo}} - {{$articulo->nom_articulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Precio Unitario</h3>
                    <div class="tbl_abajo">
                        <span>$</span>
                        <input type="number" name="pu[]" onkeyup="totalArticulos()" class="pu" min="1" value="{{$item->valor_unitario}}" id="precio_unitario" required>
                    </div>
                </div>
                <div class="cajas">
                    <h3>Cantidad</h3>
                    <div class="tbl_abajo">
                        <input type="number" name="vc[]" onkeyup="totalArticulos()" class="vc" min="1" value="{{$item->cantidad}}" id="valor_cantidad" required>
                    </div>
                </div>
                <div class="cajas" id="iva">
                    <h3>Iva</h3>
                    <div class="tbl_abajo">
                        <input type="number" name="vi[]" onkeyup="totalArticulos()" class="vi" id="valor_iva" min="1" value="{{$item->iva_producto}}" max="100" required>
                        <span>%</span>
                    </div>
                </div>
            </section>
            @endforeach
        </div>

        <section class="seccion_cuatro">
            <div class="scs_cuatro_arriba">
                <div>
                    <textarea required class="description" name="descripcion" id="" cols="30" rows="10" placeholder="Dirección ...">{{$item->descripcion}}</textarea>
                </div>
                @foreach ($total_factura as $item)
                <div class="total">
                    <div class="results">
                        <h3>Sub Total:</h3>
                        <input type='text' readonly value="{{$item->sub_total}}" name="resultado_sub_total" id="resultado_sub_total">
                    </div>
                    <div class="results">
                        <h3>iva:</h3>
                        <input type='text' readonly value="{{$item->iva}}" name='resultado_iva' id="resultado_iva">
                    </div>
                    <div class="results">
                        <h2>Total:</h2>
                        <input type='text' readonly value="{{$item->total}}" name='resultado_total' id="resultado_total">
                    </div>

                    @endforeach


        </section>
        <div class="scs_cuatro_abajo">
            <button class="button" type="reset">
                <h3>Limpiar</h3>
            </button>
            <button class="button" type="submit" name="registrar">
                <h3>Editar</h3>
            </button>
        </div>
    </form>
</main>

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
