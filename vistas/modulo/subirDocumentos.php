<?php
require_once '../../controladores/DocumentoControlador.php';
session_start();
if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header("location:iniciar.php");
}
$documento=new DocumentoControlador();
$documentos=$documento->listar();
$contarDocumentos=count($documentos);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <title>subir documentos</title>
  <body>

      <?php include '../HeaderLogin.php'; ?>

    <aside >
      <?php include 'barraLateralUsuario.php '; ?>
    </aside>
    <section>
      <br>
    <h2> Cargar documentos </h2>

    <form class="" action="../../controladores/?con=DocumentoControlador&fun=guardarArchivo&cc=<?php echo $_GET["cc"]; ?>&co=<?php echo $_GET["con"]; ?>&cat=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $_GET["cc"]; ?>">
      <?php for ($i=0; $i <$contarDocumentos-1 ; $i++) {?>
        <?php if ($documentos[$i]->id_categoria==$_GET["id"]): ?>
          <h3>  <?php echo $documentos[$i]->nombre ?> </h3>
        <input type="file" name="<?php echo $documentos[$i]->nombre ?>"  accept="application/pdf " required>
      <?php endif; ?>
    <?php  } ?>

    <h6>los archivos deben estar en formato pdf y no superar los 5mb de tamaño</h6>
    <input type="submit" name="guardar" value="guardar">
    </form>

    </section>
    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
