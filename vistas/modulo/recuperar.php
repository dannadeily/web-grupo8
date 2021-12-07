<?php
session_start();
session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Restablecer </title>
    <link rel="stylesheet" href="../css/iniciar.css">
  </head>

  <body>

      <?php require '../headerLogin.php'; ?>
    </header>
  <?php    if(isset($_GET['msg'])){?>
      <h2> <?php echo $_GET['msg'] ?> </h2>
    <?php } ?>
    <section class="form-login" id="container">

        <form class="" action="../../controladores/?con=UsuarioControlador&fun=recuperarContrasena"  method="post">
                <h1 >Recuperar contraseña</h1>
                <p id="correo"> codigo: <br> <input  type="text" name="codigo"   placeholder="ingrese su codigo" required> </p>
                <p id="correo"> correo electronico:<br> <input  type="mail" name="email"   placeholder="ingrese su correo" required> </p>
<br>
                  <p id="ingresar"> <input id="button-recuperar" type="submit" value="Enviar"></p>
      </form>
    </section>
    <footer>
      <?php require '../footer.php'; ?>
    </footer>

  </body>
</html>
