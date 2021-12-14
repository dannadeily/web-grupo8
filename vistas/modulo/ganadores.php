<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
require_once '../../controladores/ConvocatoriaControlador.php';
$convocatoria= new ConvocatoriaControlador();
$ganadores=$convocatoria->ganadores($_GET["conv"]);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ganadores</title>
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'barraLateralAdministrador.php';  ?>
    </aside>
    <section>
      <table>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Categoria</th>
            <th>rol</th>
            <th>Calificacion</th>
          </tr>
          <?php for ($i=0; $i <count($ganadores)-1 ; $i++) { ?>
            <tr>
            <td> <?php echo $ganadores[$i]->codigo_usuario; ?> </td>
            <td> <?php echo $ganadores[$i]->nombres; ?> </td>
            <td> <?php echo $ganadores[$i]->apellidos; ?> </td>
            <td> <?php echo $ganadores[$i]->nombre; ?> </td>
            <td> <?php echo $ganadores[$i]->rol; ?> </td>
            <td> <?php echo $ganadores[$i]->calificacion; ?> </td>  
            </tr>

      <?php    } ?>
      </table>



    </section>
    <footer>
        <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
