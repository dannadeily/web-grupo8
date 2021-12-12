<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
require_once '../../controladores/ConvocatoriaCategoriaControlador.php';
$convocatoriaCategoria=new ConvocatoriaCategoriaControlador();
$categoriasActivas=$convocatoriaCategoria->listar($_GET["conv"]);
$activas=count($categoriasActivas);
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
          <th>Categoria</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
        <?php for ($i=0; $i <$activas-1 ; $i++) { ?>
          <tr>
            <td> <?php echo $categoriasActivas[$i]->nombre ?> </td>
            <td> <?php echo $categoriasActivas[$i]->rol ?> </td>
            <td> <a href="postulados.php?cc=<?php echo $categoriasActivas[$i]->id ?>">seleccionar</a></td>
          </tr>
      <?php  } ?>
      </table>

    </section>

    <footer>
      <?php include '../footer.php' ?>
    </footer>
