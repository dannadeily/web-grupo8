<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
require_once '../../controladores/PostuladosControlador.php';
$postulados=new PostuladosControlador();
$lista=$postulados->listar();
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside>
      <?php include 'barraLateralAdministrador.php'; ?>
    </aside>
    <table>


      <tr>
        <th>Codigo</th>
        <th>Fecha de postulacion</th>
        <th>calificacion </th>
        <th>acciones</th>
      </tr>
    <?php for ($i=0; $i <count($listar)-1 ; $i++) {
      if (condition) {
      
      }
    } ?>


    </table>
    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
