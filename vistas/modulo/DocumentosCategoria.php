<?php
require_once '../../controladores/DocumentoControlador.php';

session_start();

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

    <link rel="stylesheet" href="../css/documentosCategoria.css">
    <link rel="stylesheet" href="../css/tabla.css">
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

    <section id="container-historial">
      <input type="checkbox" id="button-editar">
      <label for="button-editar" class="lbl-editar">Agregar</label>
      <br>
      <br>
      <div class="modal">
        <div class="contenedor">
          <header>
            Añadir documento
          </header>
          <label for="button-editar">X</label>
            <div class="Contenido">
              <form class="" action="../../controladores/?con=DocumentoControlador&fun=guardarDocumento" method="post">
              <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
              <p id="titulo">nombre:</p>
              <p id="inModal">  <input id="inName" type="text" name="nombre" placeholder="Documento"> </p>
              <p id="titulo"> Descripcion:</p>
              <p id="inModal">
              <textarea name="descripcion" id="txtDes"></textarea>
            </p>

            <p id="inModal"><input type="submit" name="guardar" value="guardar" ></p>
              </form>
            </div>
        </div>
      </div>
    <table id="customers">
      <tr>

        <th>Documento</th>
        <th>Requisito</th>
        <th>Accion</th>

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
  </section>


    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
