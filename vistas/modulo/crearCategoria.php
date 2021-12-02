<?php  ?>
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
         <legend>Crear Categoria:</legend>
        <form class="" action="../../controladores/?con=CategoriaControlador&fun=crearCategoria" method="post">
        <p> nombre: <input type="text" name="nombre" value=""></p>

        <p> descripcion:  <textarea name="descripcion" rows="8" cols="80"></textarea> </p>

        <input type="submit" name="continuar" value="continuar">
        </form>
      </section>


  <footer>
        <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
