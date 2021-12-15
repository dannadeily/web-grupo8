<?php
session_start();
session_destroy();
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/iniciar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  </head>
    <body onload="mensaje('<?php echo  $_GET["msg"] ?>')">
      <header>
        <?php include '../HeaderLogin.php'?>
      </header>
      <section class="form-login" id="container">
      <form action="../../controladores/?con=UsuarioControlador&fun=iniciarSesion" method="post">
        <h1>Iniciar sesión</h1>
        <p id="codigo">codigo <br> <input type="text" placeholder="ingrese su codigo" name="codigo" required autocomplete ></p>
        <p id="contrasena">contraseña <br> <input  type="password" placeholder="ingrese su contraseña" name="contrasena" required autocomplete></p>
          <br>
        <p id="ingresar"> <input id="button-iniciar" type="submit" value="ingresar"></p>

        <p id="link"> <a href="recuperar.php">¿olvido su contraseña?</a></p>
        <p id="link"><a href="registrar.php">registrarse</a></p>

      </form>


      </section>
      <footer>
          <?php include '../footer.php'?>
      </footer>
      <script src="../js/alertas.js">   </script>
    </body>


</html>
