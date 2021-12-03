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
        <legend> Seleccionar categorias </legend>
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

            <td> <a href=> <input style="background-color:green" type="submit" name="estado"   value="  activa    "> </a> </td>
          <?php } else{
            ?>
              <td> <a href=> <input style="background-color:red" type="submit" name="estado" value="desactiva"> </a> </td>
            <?php
          }  ?>
          <td>   visualizar   </td>
          <td> <a href="editarCategoria.php?id=<?php echo $listar[$i]->id_categoria ?>"> editar
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
