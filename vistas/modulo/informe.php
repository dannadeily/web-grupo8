
<?php
require_once '../../controladores/ConvocatoriaControlador.php';
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
$convocatoria=new ConvocatoriaControlador();
$historial=$convocatoria->historial();
$count=count($historial);
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/tabla.css">
    <title>Generar informe</title>
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
            <th>Informe</th>

          </tr>

        <?php for ($i=0; $i < $count-1; $i++) { ?>
          <tr>
            <td> <?php echo $historial[$i]->titulo; ?> </td>
            <td> <?php echo $historial[$i]->descripcion; ?> </td>
            <td> <?php echo $historial[$i]->fecha_inicio; ?> </td>
            <td> <?php echo $historial[$i]->fecha_fin; ?> </td>
            <td> <a href="../../controladores/informe.php?conv=<?php echo $historial[$i]->id_convocatoria;  ?>" target="_blank">Participantes  </a>
                <br>
                 <a href="../../controladores/informeGanadores.php?conv=<?php echo $historial[$i]->id_convocatoria;  ?>"  target="_blank">Ganadores</a></td>
          </tr>
        <?php } ?>
        </table>

      </section>

      <footer>
          <?php include '../footer.php'; ?>
      </footer>
  </body>
</html>
