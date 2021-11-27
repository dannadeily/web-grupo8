<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Restablecer </title>
    <link rel="stylesheet" href="../css/recuperar.css">


  </head>
  <body>
    <header>
      <?php require '../headerLogin.php'; ?>
    </header>
  <?php    if(isset($_GET['msg'])){?>
      <h2> <?php echo $_GET['msg'] ?> </h2>
    <?php } ?>
    <section class="recuperar">

<form class="" action="../../controladores/?con=AdministradorControlador&fun=recuperarContrasena" method="post">

      <p> <p id="correo"> codigo:</p> <br> <input id="ingresar" type="text" name="codigo"   placeholder="ingrese su codigo" required> </p>
      <p> <p id="correo"> correo electronico:</p> <br> <input id="ingresar" type="mail" name="email"   placeholder="ingrese su correo" required> </p>
      <p> <input type="submit" name="enviar" value="enviar"> </p>
</form>
    </section>
    <footer>
      <?php require '../footer.php'; ?>
    </footer>

  </body>
</html>
