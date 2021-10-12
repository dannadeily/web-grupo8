<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../vista/loginuser.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>

    <header class="page-header" >
        <?php
        include '../vista/Header.php';
         ?>
    </header>

    <section class="form-login">
    <form action="../controlador/validarloginuser.php" method="post">
      <h1>Premio al merito</h1>
    <p id="codigo">codigo <br> <input type="text" placeholder="ingrese su codigo" name="codigo"></p>
      <p id="contrasena">contraseña <br> <input type="password" placeholder="ingrese su contraseña" name="contrasena"></p>
    <p id="ingresar"> <input  type="submit" value="ingresar"></p>  </br>

    <p id="link"> <a href="recuperarContraseña">¿olvido su contraseña?</a></p>  </br>
    <p id="link"><a href="usuario.php">registrarse</a></p> <br>

    <p id="link"><a  href="loginadmin.php">administrador</a></p>
    </form>

    </section>
  </body>
</html>
