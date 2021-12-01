
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/iniciar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  </head>
    <body>

      <header>
        <?php include '../HeaderLogin.php'?>
      </header>
      <?php if (isset($_GET['msg'])): ?>
        <h2>  <?php echo $_GET['msg'] ?> </h2>
      <?php endif; ?>
      <section class="form-login">
      <form action="../../controladores/?con=UsuarioControlador&fun=iniciarSesion" method="post">
        <h1>Iniciar sesión</h1>
        <p id="codigo">codigo <br> <input class="input-iniciar" type="text" placeholder="ingrese su codigo" name="codigo" required autocomplete ></p>
        <p id="contrasena">contraseña <br> <input class="input-iniciar" type="password" placeholder="ingrese su contraseña" name="contrasena" required autocomplete></p>
      <p id="ingresar"> <input  type="submit" value="ingresar"></p>
<br>
      <p id="link"> <a href="recuperar.php">¿olvido su contraseña?</a></p>
      <p id="link"><a href="registrar.php">registrarse</a></p>




      </form>
      <div id="iniciar-admi">
        <hr>
        <p id="link"><a href="iniciarAdmin.php"><abbr title="administrador"><i class="fas fa-address-card" style="font-size:40px;color:red"></i></abbr></a></p>

      </div>
      </section>
      <footer>
          <?php include '../footer.php'?>
      </footer>
    </body>


</html>
