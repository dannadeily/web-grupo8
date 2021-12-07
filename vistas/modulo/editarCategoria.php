<?php
require_once '../../controladores/CategoriaControlador.php';
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
$categoria=new CategoriaControlador();
$listar=$categoria->listar($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/editarCategoria.css">
    <title></title>
  </head>

  <body>
    <header>
      <?php include '../headerLogin.php'; ?>
    </header>
      <aside class="">
        <?php include 'BarraLateralAdministrador.php'; ?>
      </aside>

      <section id="container-editarC">

         <legend>Editar Categoria:</legend>
         <hr>
        <form class="" action="../../controladores/?con=CategoriaControlador&fun=editar" method="post">
          <input type="hidden" name="id" value="  <?php echo $listar[0]->id_categoria; ?> ">
        <p> nombre: <input type="text" name="nombre" value=" <?php echo $listar[0]->nombre; ?> "></p>

        <p> descripcion: </p>
        <textarea style="resize: none" name="descripcion" rows="8" cols="80"><?php echo $listar[0]->descripcion;?></textarea> <br>

        <p id="button-categoria"><input type="submit" name="continuar" value="actualizar"></p>

        </form>

      </section>


  <footer>
        <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
