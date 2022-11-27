<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/swetalerts.js')}}"></script>
</head>

<body>
    @yield('seccion')
</body>

</html>

@if ($errors->any())
@foreach ($errors->all() as $message)
<script>
    error('Error', '<?php echo $message ?>')
</script>
@endforeach

@endif
