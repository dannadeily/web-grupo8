<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
require_once '../../controladores/DocumentoControlador.php';
$documento=new DocumentoControlador();
$informacion=$documento->buscar($_GET['id']);
$count=count($informacion);


?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Editar documento</title>

    <link rel="stylesheet" href="../css/editarCategoria.css">
    <title>Editar documento</title>


  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'barraLateralAdministrador.php'; ?>
    </aside>

    <section id="container-editarC">
      <form class="" action="index.html" method="post">
        <p> Nombre </p>
        <input class="input-nombre" type="text" name="nombre" value="<?php echo $informacion[0]->nombre; ?>">
        <br>
        <p>Descripcion</p>
        <textarea style="resize: none" name="descripcion" rows="8" cols="80" name="descripcion"><?php echo $informacion[0]->descripcion; ?></textarea>
        <p id="button-categoria"><input type="submit" name="continuar" value="actualizar"></p>
      </form>
    </section>

    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
