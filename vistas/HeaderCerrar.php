<?php
require $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/config/config.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=<?php ruta?>"/web-grupo8/vistas/css/headerLogin.css">
  </head>
  <body>

    <nav class="navbar navbar-inverse " id="navegacion" >

      <div class="container-fluid">
        <div class="navbar-header">
      <img src=<?php ruta?>"/web-grupo8/vistas/img/logo.png"  alt="" >
          <a class="navbar-brand" href="#">

          </a>
        </div>



        <ul class="nav navbar-nav navbar-right">

          <li><a href="#"  id="sign"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
        </ul>
      </div>

    </nav>

  </body>
</html>
