<?php
require_once '../../controladores/DocumentoControlador.php';
<<<<<<< HEAD
=======
session_start();
>>>>>>> c550dad45a407815012269975f3da370253a3b1a
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
$documento=new DocumentoControlador();
$informacion=$documento->listar($_GET['id']);
$count=count($informacion);
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
    <aside class="">
      <?php include 'barraLateralAdministrador.php'; ?>
    </aside>
    <table>
      <tr>

        <th>Documento</th>
        <th>Requisito</th>
        <th>Accion</th>

      </tr>
      <tr>
        <td colspan="3">  <details agregar>
            <summary> agregar </summary>
          <form class="" action="../../controladores/?con=DocumentoControlador&fun=guardarDocumento" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
            <input type="text" name="nombre"  placeholder="nombre">
            <input type="text" name="descripcion"  placeholder="descripcion">
            <input type="submit" name="guardar" value="guardar">
         </form>
        </details> </td>
      </tr>
      <?php for ($i=0; $i <$count-1 ; $i++) {
        ?>
        <tr>
          <td><?php echo $informacion[$i]->nombre ?></td>
          <td><?php echo $informacion[$i]->descripcion ?></td>
          <td>editar <a href="../../controladores/?con=DocumentoControlador&fun=borrarDocumento&id=<?php echo $_GET['id']?>&idDoc=<?php echo $informacion[$i]->id_documento ?>" >borrar</a></td>
        </tr>

        <?php
      } ?>


    </table>


    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
