<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])||($_SESSION['rol']!="Estudiante"&&$_SESSION['rol']!="Egresado")) {
  header("location:iniciar.php");
}
include '../../controladores/PostuladosControlador.php';
$postulados=new PostuladosControlador();
$postulaciones=$postulados->listar($_SESSION['usuario']);
$count=count($postulaciones);
 ?>

<!DOCTYPE html>
  <head>
    <html lang="es" dir="ltr">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/inscripcion.css">
    <title></title>
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside class="">
      <?php include 'BarraLateralUsuario.php' ?>
    </aside>

    <section  id="container-inscripcion">

      <legend>Inscripciones:</legend>
      <hr>
      <table id="customers-inscripcion">
        <tr>
          <th>Convocatoria</th>
          <th>Categoria</th>
          <th>Calificacion</th>

        </tr>
        <?php for ($i=0; $i <$count-1 ; $i++) {?>
          <tr>
            <td> <?php echo $postulaciones[$i]->titulo ?> </td>
            <td><?php echo $postulaciones[$i]->nombre ?></td>
            <td><?php echo $postulaciones[$i]->calificacion ?></td>

          </tr>
        <?php } ?>
      </table>
    </section>


    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
