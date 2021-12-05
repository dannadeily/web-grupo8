<?php
require_once '../../controladores/DocumentoControlador.php';
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

    <form class="" action="" method="post" enctype="multipart/form-data">
      <?php for ($i=0; $i <$contarDocumentos-1 ; $i++) {?>
        <h3>  <?php echo $documentos[$i]->nombre ?> </h3>
        <input type="file" name="<?php $documentos[$i]->nombre ?>"  accept="application/pdf">
    <?php  } ?>

    <h6>los archivos deben estar en formato pdf y no superar los 5mb de tamaño</h6>
    <input type="submit" name="guardad" value="guardar">
    </form>

    </section>
    <footer>
      <?php include '../footer.php'; ?>
    </footer>
  </body>
</html>
