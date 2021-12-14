<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear categoria</title>
    <link rel="stylesheet" href="../css/crearCategoria.css">
  </head>
  <body>
    <header>
      <?php include '../headerLogin.php'; ?>
    </header>
      <aside class="">
        <?php include 'BarraLateralAdministrador.php'; ?>
      </aside>
      

      <section  id="container-crearC">
        <hr>
         <legend>Crear Categoria:</legend>
         <br>
         <br>
        <form class="" action="../../controladores/?con=CategoriaControlador&fun=crearCategoria" method="post">
        <p> Nombre: <input type="text" name="nombre" value=""></p>
        <p> Tipo de usuario: <select class="" name="rol">
          <option value="Estudiante">Estudiante</option>
          <option value="Egresado">Egresado</option>
        </select> </p>
        <p> Descripcion:  <textarea name="descripcion" rows="8" cols="80"></textarea> </p>

        <input type="submit" name="continuar" value="continuar">
        </form>
        <hr>
      </section>


  <footer>
        <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
