<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/iniciar.css">
  </head>
    <body>

      <header>
        <?php include '../HeaderLogin.php'?>
      </header>
      <?php if (isset($_GET['msg'])): ?>
        <h2>  <?php echo $_GET['msg'] ?> </h2>
      <?php endif; ?>
      <section class="form-login">
      <form action="../../controladores/?con=AdministradorControlador&fun=iniciarSesion" method="post">
       <h1>Iniciar sesión: Administrador</h1>
        <p id="codigo">codigo <br> <input  type="text" placeholder="ingrese su codigo" name="codigo" required autocomplete ></p>
        <p id="contrasena">contraseña <br> <input type="password" placeholder="ingrese su contraseña" name="contrasena" required autocomplete></p>
        <p id="ingresar"> <input  type="submit" value="ingresar"></p>

      <p id="link"> <a href="recuperarAdmin.php">¿olvido su contraseña?</a></p>
      </form>

      </section>
      <footer>
          <?php include '../footer.php'?>
      </footer>
    </body>


</html>
