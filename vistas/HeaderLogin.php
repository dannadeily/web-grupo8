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
    <link rel="stylesheet" href=<?php ruta?>"/web-grupo8/vistas/css/header.css">
  </head>
  <body>

    <nav class="navbar navbar-inverse " id="navegacion" >

      <div class="container-fluid">
        <div class="navbar-header">
      <img id="logo" src=<?php ruta?>"/web-grupo8/vistas/img/logo.png"  alt=""  >
                  </div>

        <ul class="nav navbar-nav">
          <?php
    //class active para resaltar la pesatñaen la que se encuentra
           ?>

          <li ><a href="<?php ruta?>/web-grupo8/index.php" id="index" > <u>Inicio</u> </a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">

          <p><?php if (!isset($_SESSION['usuario'])){ ?>

          <li><a href="<?php ruta?>/web-grupo8/vistas/modulo/registrar.php"  id="sign"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
          <li><a href="<?php ruta?>/web-grupo8/vistas/modulo/iniciar.php"  id="sign"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
          <?php }else{ ?>
          <li><a href="<?php ruta?>/web-grupo8/controladores/?con=UsuarioControlador&fun=cerrarSesion"  id="sign"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
        <?php } ?>
        </ul>
      </div>

    </nav>
	 <section

	</section>
  </body>
</html>
