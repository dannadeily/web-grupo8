<?php
require_once '../../controladores/CategoriaControlador.php';
$categoria=new CategoriaControlador();
$listar=$categoria->listar();
$count=count($listar);
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
        <table>
          <tr>
            <th>nombre</th>
            <th>estado</th>
            <th>documentos requeridos</th>
            <th>editar</th>
          </tr>

        <?php for ($i=0; $i < $count-1; $i++) { ?>
          <tr>
            <td> <?php echo $listar[$i]->nombre; ?> </td>
          <form class="" action="../../controladores/?con=CategoriaControlador&fun=estado&id=<?php echo $listar[$i]->id_categoria?>&estado=<?php echo $listar[$i]->estado?>" method="post">
          <?php if ($listar[$i]->estado>0){ ?>

            <td> <a href=> <input type="submit" name="estado" value="desactivar"> </a> </td>
          <?php } else{
            ?>
              <td> <a href=> <input type="submit" name="estado" value="activar"> </a> </td>
            <?php
          }  ?>
          <td></td>
          <td> <a href="#"> editar
           </a> </td>
          </tr>
          </form>
        <?php } ?>

        </table>
      </section>

      <footer>
          <?php include '../footer.php'; ?>
      </footer>


  </body>
</html>
