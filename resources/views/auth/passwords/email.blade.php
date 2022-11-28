@extends('layouts.app')

@section('titulo')
{{'Recuperar Contraseña'}}
@endsection

@section('seccion')
<form class="inicio_Secion" method="POST" action="{{route('password.email')}}">
    @csrf
    <a href="{{ route('login') }}">
        <img src="{{asset('img/WhatsApp_Image_2022-08-02_at_1.40.46_PM .svg')}}" alt="logo" height="120em">
    </a>
    <h2 class="form_titulo">Recuperar Contraseña</h2>
    <div class="from_container">
        <div class="from_group">
            <input type="email" id="E-mail" class="from_input" placeholder=" " name="email" required value="{{old('email')}}">
            <label for="E-mail" class="from_label">E-mail</label>
            <span class="from_line"></span>
        </div>
        <button type="submit" class="form_submit">Enviar</button>
    </div>
</form>
@endsection
