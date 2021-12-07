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
    <link rel="stylesheet" href="../css/tabla.css">
    <title>Historial</title>
  </head>
  <body>
    <header>
      <?php include '../headerLogin.php'; ?>
    </header>
      <aside class="">
        <?php include 'BarraLateralAdministrador.php'; ?>
      </aside>


      <section id="container-historial">
        <legend id="titulo-tabla">Historial de convocatorias</legend>
        
        <hr>
        <table id="customers">
          <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha de apertura</th>
            <th>Fecha de cierre</th>
          </tr>

        <?php for ($i=0; $i < $count-1; $i++) { ?>
          <tr>
            <td> <?php echo $historial[$i]->titulo; ?> </td>
            <td> <?php echo $historial[$i]->descripcion; ?> </td>
            <td> <?php echo $historial[$i]->fecha_inicio; ?> </td>
            <td> <?php echo $historial[$i]->fecha_fin; ?> </td>
          </tr>
        <?php } ?>
        </table>

      </section>

      <footer>
          <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
