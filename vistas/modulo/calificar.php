<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}else {
  require_once '../../controladores/ConvocatoriaControlador.php';
  $convocatoria=new ConvocatoriaControlador();
  $listaConvocatorias=$convocatoria->historial();

}
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Convocatorias</title>
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'barraLateralAdministrador.php' ?>
    </aside>
<section>
  <table>
    <tr>
      <th>Titulo</th>
      <th>descripcion</th>
      <th>Fecha de cierre</th>
      <th>Dias restantes</th>
      <th>acciones</th>
    </tr>

    <?php for ($i=0; $i <count($listaConvocatorias)-1 ; $i++) {

      ?>
      <tr>
        <td><?php echo $listaConvocatorias[$i]->titulo ;?></td>
        <td><?php echo $listaConvocatorias[$i]->descripcion ;?></td>
        <td><?php echo $listaConvocatorias[$i]->fecha_fin ;?></td>
        <td><?php echo $convocatoria->diasRestantes($listaConvocatorias[$i]->fecha_fin);?></td>
        <td>Calificar</td>
      </tr>

    <?php } ?>
  </table>
</section>
    <?php
    echo "<br> fecha de fin: ".$listaConvocatorias[0]->fecha_fin."<br>";
    echo date(strtotime("d-m-Y"."+ 1 month"));
    echo "metodo internet";

    $fecha_actual = $listaConvocatorias[0]->fecha_fin;
//sumo 1 mes
echo date("d-m-Y",strtotime($fecha_actual."+ 1 year"));
     ?>


    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
