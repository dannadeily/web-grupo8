
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/iniciar.css">
  </head>
    <body>

      <header>
        <?php include '../HeaderLogin.php'?>
      </header>

      <section class="form-login">
      <form action="" method="post">
        <h1>Premio al merito</h1>
      <p id="codigo">codigo <br> <input  type="text" placeholder="ingrese su codigo" name="codigo" required autocomplete ></p>
        <p id="contrasena">contraseña <br> <input type="password" placeholder="ingrese su contraseña" name="contrasena" required autocomplete></p>
      <p id="ingresar"> <input  type="submit" value="ingresar"></p>  </br>

      <p id="link"> <a href="recuperar.php">¿olvido su contraseña?</a></p>  </br>
      <p id="link"><a href="registrar.php">registrarse</a></p> <br>
      </form>

      </section>
      <footer>
          <?php include '../footer.php'?>
      </footer>
    </body>


</html>
