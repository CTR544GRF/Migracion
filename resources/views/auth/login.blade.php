@extends('layouts.app')

@section('titulo')
{{'Iniciar Secion'}}
@endsection

@section('seccion') <form class="inicio_Secion" method="POST" action="{{route('login')}}">
    @csrf
    <a href="{{ route('home') }}">
        <img src="{{asset('img/WhatsApp_Image_2022-08-02_at_1.40.46_PM .svg')}}" alt="logo" height="120em">
    </a>
    <h2 class="form_titulo">Iniciar Sesión</h2>
    <div class="from_container">
        <div class="from_group">
            <input type="email" id="E-mail" class="from_input" placeholder=" " name="email" required value="{{old('email')}}">
            <label for="E-mail" class="from_label">E-mail</label>
            <span class="from_line"></span>
        </div>
        <div class="from_group">
            <input type="password" id="password" class="from_input" placeholder=" " name="password" required minlength="6">
            <label for="password" class="from_label">Contraseña</label>
            <span class="from_line"></span>

        </div>
        <div>
            <a id="form_rc" href="{{ route('password.request') }}">Recuperar Contraseña</a>
        </div>
        <!-- <input type="submit" value="Ingresar" class="form_submit" name="submit"> -->
        <button type="submit" class="form_submit">Registrar</button>
    </div>
</form>
@endsection
