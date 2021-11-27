<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/UsuarioControlador.php';
$usuario=new UsuarioControlador();
  session_start();
if (isset($_SESSION['usuario'])) {
  $datos=$usuario->listar($_SESSION['usuario']);
}
else {
  header("location:iniciar.php");
}

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> cambiar contraseña </title>
    <link rel="stylesheet" href="../css/cambiarContrasena.css">
  </head>
  <body>
<header>
<?php include '../HeaderLogin.php'; ?>
</header>
  <aside class="">
      <?php include 'BarraLateralAdministrador.php'; ?>
  </aside>
  <section>
    <form class="form" action="../../controladores/?con=AdministradorControlador&fun=cambiarContrasena" method="post">
    <p class="p"> contraseña actual  <input type="password" name="actual" placeholder="contraseña actual" required> </p>
    <p class="p">  nueva contraseña <input type="password" name="nueva1" placeholder="contraseña nueva" required>  </p>
    <p class="p"> repetir nueva contraseña <input type="password" name="nueva2" placeholder="contraseña nueva" required></p>
    <input type="submit" name="enviar" value="guardar">
    </form>
  </section>
<footer>
<?php include '../footer.php'; ?>
</footer>
  </body>
</html>
