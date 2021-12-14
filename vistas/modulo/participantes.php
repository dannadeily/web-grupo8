<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:../vistas/modulo/iniciar.php");
}
if (empty($_GET["conv"])) {
  header("location:../vistas/modulo/historial.php");
}
require '../../controladores/ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$lista=$convocatoria->informe($_GET["conv"]);
$categoria="";

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/tabla.css">
    <title>Participantes</title>
  </head>
  <body>
    <header>

      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'barraLateralAdministrador.php';  ?>
    </aside>
    <section id="container-historial">
      <?php for ($i=0; $i <count($lista)-1 ; $i++) {
        if ($lista[$i]->nombre!=$categoria) {
          $categoria=$lista[$i]->nombre; ?>
          <legend> <?php echo $lista[$i]->nombre; ?> </legend>

          <table id="customers">
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Codigo</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Postulacion</th>
            <th>Nota</th>
          </tr>
        <?php }  ?>
        <tr>

          <td><?php echo $lista[$i]->nombres ?> </td>
          <td><?php echo $lista[$i]->apellidos ?> </td>
          <td><?php echo $lista[$i]->codigo_usuario ?> </td>
          <td><?php echo $lista[$i]->email ?> </td>
          <td><?php echo $lista[$i]->rol ?> </td>
          <td><?php echo $lista[$i]->fecha_postulacion ?> </td>
          <td><?php echo $lista[$i]->calificacion ?> </td>

        </tr>

        </table>
    <?php  } ?>

    </section>

    <footer>
      <?php include '../footer.php'; ?>
    </footer>
