<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .campos {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: flex-start;
            padding: 0 0 0 20px;
        }
    </style>
</head>

<body>
    <div class="container" style="
    margin: auto;
    width: 60%;
    background: #ecf6f5;
    border-radius: 20px;
    text-align: center;
    padding: 10px;
">
        <h1>Informacion de Contacto</h1>
        <div class="campos">
            <h2>
                <strong>Nombre:</strong>
            </h2>
            <h3>{{$contacto['nombre']}}</h3>
        </div>
        <div class="campos">
            <h2>
                <strong>Telefono Celular:</strong>
            </h2>
            <h3>{{$contacto['celular']}}</h3>
        </div>

        <div class="campos">
            <h2>
                <strong>Correo Electronico:</strong>
            </h2>
            <h3>{{$contacto['correo']}}</h3>
        </div>

        <div class="campos">
            <h2>
                <strong>Ciudad de Contacto:</strong>
            </h2>
            <h3>{{$contacto['ciudad']}}</h3>
        </div>

        <div class="campos">
            <h2>
                <strong>Descricion:</strong>
            </h2>
            <h3>{{$contacto['mensaje']}}</h3>
        </div>
    </div>

</body>

</html>
