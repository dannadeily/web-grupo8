<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])||$_SESSION['rol']!="usuario") {
  header("location:iniciar.php");
}
 ?>

<!DOCTYPE html>
  <head>
    <html lang="es" dir="ltr">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'BarraLateralUsuario.php' ?>
    </aside>




    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
