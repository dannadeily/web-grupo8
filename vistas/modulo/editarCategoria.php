<?php
require_once '../../controladores/CategoriaControlador.php';
$categoria=new CategoriaControlador();
$listar=$categoria->listar($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <?php include '../headerLogin.php'; ?>
    </header>
      <aside class="">
        <?php include 'BarraLateralAdministrador.php'; ?>
      </aside>

      <section>
         <legend>Editar Categoria:</legend>
        <form class="" action="../../controladores/?con=CategoriaControlador&fun=editar" method="post">
          <input type="hidden" name="id" value="  <?php echo $listar[0]->id_categoria; ?> ">
        <p> nombre: <input type="text" name="nombre" value=" <?php echo $listar[0]->nombre; ?> "></p>

        <p> descripcion: </p>
        <textarea name="descripcion" rows="8" cols="80"><?php echo $listar[0]->descripcion;?></textarea> <br>

        <input type="submit" name="continuar" value="actualizar">
        </form>
      </section>


  <footer>
        <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
