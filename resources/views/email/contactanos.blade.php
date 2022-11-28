<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>
    <h1>Informacion de Contacto</h1>
    <p>
        <strong>
            <h2>Nombre:</h2>
        </strong>
        {{$contacto['nombre']}}
    </p>
    <p>
        <strong>
            <h2>Telefono Celular:</h2>
        </strong>
        {{$contacto['celular']}}
    </p>
    <p>
        <strong>
            <h2>Correo Electronico:</h2>
        </strong>
        {{$contacto['correo']}}
    </p>
    <p>
        <strong>
            <h2>Ciudad de Contacto:</h2>
        </strong>
        {{$contacto['ciudad']}}
    </p>
    <p>
        <strong>
            <h2>Descripcion:</h2>
        </strong>
        {{$contacto['mensaje']}}
    </p>

</body>

</html>
