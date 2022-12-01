@extends('layouts.app')

@section('seccion')

<form class="inicio_Secion" method="POST" action="{{ route('password.update') }}">
    @csrf
    <a href="{{ route('login') }}">
        <img src="{{asset('img/WhatsApp_Image_2022-08-02_at_1.40.46_PM .svg')}}" alt="logo" height="120em">
    </a>

    <h2 class="form_titulo">Restablecer contraseña</h2>
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="from_container">
        <div class="from_group">
            <input type="email" id="E-mail" class="from_input" placeholder=" " name="email" required value="{{ $email ?? old('email') }}">
            <label for="E-mail" class="from_label">E-mail</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="password" id="E-mail" class="from_input" placeholder=" " name="password" required value="{{old('email')}}">
            <label for="E-mail" class="from_label">Contraseña</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="password" id="E-mail" class="from_input" placeholder=" " name="password_confirmation" required value="{{old('email')}}">
            <label for="E-mail" class="from_label">Confirmar Contraseña</label>
            <span class="from_line"></span>
        </div>
        <button type="submit" class="form_submit">Cambiar Contraseña</button>
    </div>
</form>
@endsection
