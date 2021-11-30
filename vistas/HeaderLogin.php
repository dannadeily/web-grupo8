<?php
require $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/config/config.php';
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cabecera fija</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=<?php ruta?>"/web-grupo8/vistas/css/header.css">
</head>

<body id="body-header">

  <header id="main-header">

	<a id="logo-header" href="#">
		<span class="site-name"><img  width="200" id="logo" src=<?php ruta?>"/web-grupo8/vistas/img/logo.png"  alt=""  ></span>
	</a> <!-- / #logo-header -->

	<nav id="nav-header">
		<ul>
      <?php if (!isset($_SESSION['usuario'])){ ?>
            <li ><a href="<?php ruta?>/web-grupo8/index.php" id="index" > <u>Inicio</u> </a></li>
              <?php } ?>
              <?php if (!isset($_SESSION['usuario'])){ ?>

                <li><a href="<?php ruta?>/web-grupo8/vistas/modulo/registrar.php"  id="sign"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                <li><a href="<?php ruta?>/web-grupo8/vistas/modulo/iniciar.php"  id="sign"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                <?php }else{ ?>
                <li><a href="<?php ruta?>/web-grupo8/controladores/?con=UsuarioControlador&fun=cerrarSesion"  id="sign"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
              <?php } ?>
		</ul>
	</nav><!-- / nav -->

</header><!-- / #main-header -->
</body>
</html>
