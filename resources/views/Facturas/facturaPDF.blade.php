<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Factura PDF</title>
    <style>
    * {
        font-size: 10PX;
    }

    .factura {
    table-layout: fixed;
    }

    .fact-info > div > h5 {
    font-weight: bold;
    }

    .factura > thead {
    border-top: solid 3px #000;
    border-bottom: 3px solid #000;
    background-color: #278787;
    }

    .factura > thead > tr > th:nth-child(2), .factura > tbod > tr > td:nth-child(2) {
    width: 300px;
    font-size: 10PX;
    }

    .factura > thead > tr > th:nth-child(n+3) {
    text-align: right;
    font-size: 10PX;
    }

    .factura > tbody > tr > td:nth-child(n+3) {
    text-align: right;
    font-size: 10PX;
    }

    .factura > tfoot > tr > th, .factura > tfoot > tr > th:nth-child(n+3) {
    font-size: 10PX;
    text-align: right;
    }

    .cond {
    border-top: solid 2px #000;
    }

    h2 {
    text-align: center;
    padding-bottom: 10px;
    padding-top: 10px;
    border-bottom: 3px solid #000;
    background-color: #278787;
    border-top: 3px solid #000;
    }
    img {
        width: 60px;
        background: black;
        padding-right: 45px; 
        padding-left: 45px;
        margin-bottom: 10px;
    }

    .prueba {
        display: flex;
        flex-flow: row;
        justify-content: space-around;
        align-content: center;
        margin-top: 20px;
    }

    span {
        color: rgba(31, 30, 30, 0.759);
        font-size: 12px;
        font-weight: normal;    
    }

    </style>
</head>
<body>
    <h2>FACTURA</h2>
    <div class="prueba">
      <div class="1">
        <img src="img/Logo letra blanca.png" />
        <h1>Sadidas S.A.S</h1>
        <p><span>Cr 158B # 138 D - 17, Barrio: Caracoli, Ciudad Bolivar, Bogotá.</span></p>
      <hr />
        <h5>N° de factura: <span>103</span></h5>
        <h5>Tipo factura: <span>Arian Manuel Garcia Reynoso</span></h5> 
        <h5>Enviar a/ o enviado por: <span>Cotui, Sanchez Ramirez Santa Fe, #19, arianmanuel75@gmail.com </span></h5>
        <h5>Fecha: <span>09/05/2019</span></h5>
        <h5>Usuario quien realiza:<span> 1235435 - Esteban Hernandez</span></h5>
      </div>
    </div>
  
    <hr />
  
    <div class="row my-5">
      <table class="table table-borderless factura">
        <thead>
          <tr>
            <th>Cant.</th>
            <th>Descripcion</th>
            <th>Precio Unitario</th>
            <th>Iva %</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Clases de Cha-Cha-Cha</td>
            <td>3,000.00</td>
            <td>3,000.00</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Clases de Salsa</td>
            <td>4,000.00</td>
            <td>12,000.00</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th>SubTotal Factura</th>
            <th>RD$15,000.00</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th>Total Iva</th>
            <th>RD$15,000.00</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th>Total Factura</th>
            <th>RD$15,000.00</th>
          </tr>
        </tfoot>
      </table>
    </div>
  
    <div class="cond row">
      <div class="col-12 mt-3">
        <h4>Condiciones y formas de pago</h4>
        <P>El pago se debe realizar en un plazo de 15 dias. Bancolombia - N° cuenta: 999032205,
          Nequi: 3006493185, Daviplata: 3006493185.  Contacto: 7392168 - 3006493185.
        </p>
      </div>
    </div>
</body>
</html>