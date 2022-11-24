<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

</head>

<body>

    <h1 id="main">Menú</h1>
    <div class="usuario">
        <div class="containers">
            <div class="usuarios">
                <a href="{{ route('usuarios.index')}}"><img class="img_top" src="img/icons8-persona-de-sexo-masculino-64.png" alt="usuarios"></a>
                <h2 class="titulo_usuarios">Usuarios</h2>
            </div>
            <div class="usuarios">
                <a href="{{ route('empresas.index')}}"><img class="img_top" src="img/icons8-cliente-de-empresa-60.png" alt=""></a>
                <h2 class="titulo_usuarios">Empresas</h2>
            </div>
            <div class="usuarios">
                <a href="{{ route('facturas.index')}}"><img class="img_top" src="img/icons8-invoices-60.png" alt=""></a>
                <h2 class="titulo_usuarios">Facturas</h2>
            </div>
            <div class="usuarios">
                <a href="#.index"><img class="img_top" src="img/icons8-script-de-informes-de-gráficos.png" alt="usuarios"></a>
                <h2 class="titulo_usuarios">Reportes</h2>
            </div>
        </div>
        <div class="containers">

            <div class="usuarios">
                <a href="{{ route('inventario.index')}}"><img class="img_top" src="img/icons8-producto-nuevo.png" alt="usuarios"></a>
                <h2 class="titulo_usuarios">Inventario</h2>
            </div>
            <div class="usuarios">
                <a href="{{ route('articulos.index')}}"><img class="img_top" src="img/icons8-suéter.png" alt=""></a>
                <h2 class="titulo_usuarios">Artículos</h2>
            </div>
            <div class="usuarios">
                <a href="{{ route('entradas.index')}}"><img class="img_top" src="img/mas2.png" alt="" height="65px"></a>
                <h2 class="titulo_usuarios">Entradas</h2>
            </div>
            <div class="usuarios">
                <a href="{{ route('salidas.index')}}"><img class="img_top" src="img/menos.png" alt="" height="65px"></a>
                <h2 class="titulo_usuarios">Salidas</h2>
            </div>
        </div>
    </div>
    <div class="div_cerrar">
        <a href="login.php" class="btn_cerrar" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <h3>Cerrar sesión</h3><img src="{{ asset('img/log-out-regular-24.png')}}" alt="">
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</body>

</html>
