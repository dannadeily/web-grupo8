<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
require_once '../../controladores/PostuladosControlador.php';
require_once '../../controladores/ConvocatoriaCategoriaControlador.php';
$postulados=new PostuladosControlador();
$lista=$postulados->listar();
if (!empty($_GET["cc"])) {
  $convocatoriaCategoria=new ConvocatoriaCategoriaControlador();
  $convocatoria=$convocatoriaCategoria->buscar($_GET["cc"]);
}
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
    <legend>Seleccione Usuario</legend>
    <table>


      <tr>
        <th>Codigo</th>
        <th>Fecha de postulacion</th>
        <th>calificacion </th>
        <th>documentos</th>
        <th>Calificar</th>
      </tr>
    <?php for ($i=0; $i < count($lista)-1 ; $i++) {
      if ($lista[$i]->id_convocatoria_categoria==$_GET["cc"]) {
        ?>
        <tr>
          <td> <?php echo $lista[$i]->codigo_usuario ?>  </td>
          <td> <?php echo $lista[$i]->fecha_postulacion ?>  </td>
          <td> <?php echo $lista[$i]->calificacion ?>  </td>
          <td> <a href="documentosUsuario.php?conv=<?php echo $convocatoria->id_convocatoria ?>&&cat=<?php echo $convocatoria->id_categoria ?>&&usuario=<?php echo$lista[$i]->codigo_usuario ?>">revisar</a> </td>
        </tr>

        <?php
      }
    } ?>


    </table>
    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
