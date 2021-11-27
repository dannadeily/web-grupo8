<?php
require_once '../../controladores/ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$historial=$convocatoria->historial();
$count=count($historial);
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Historial</title>
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
            <th>titulo</th>
            <th>descripcion</th>
            <th>fecha_inicio</th>
            <th>fecha_fin</th>
          </tr>

        <?php for ($i=0; $i < $count-1; $i++) { ?>
          <tr>
            <td> <?php echo $historial[$i]->titulo; ?> </td>
            <td> <?php echo $historial[$i]->descripcion; ?> </td>
            <td> <?php echo $historial[$i]->fecha_inicio; ?> </td>
            <td> <?php echo $historial[$i]->fecha_fin; ?> </td>
            <td>    </td>
            <td>    </td>
          </tr>


        <?php } ?>
        </table>





      </section>




      <footer>
          <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
