<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:iniciar.php");
}
$ruta="../../documentos/".$_GET["conv"]."/".$_GET["cat"]."/".$_GET["usuario"];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../css/modalNota.css">
  </head>
  <body>
    <header>
      <?php include '../HeaderLogin.php'; ?>
    </header>
    <aside>
      <?php include 'barraLateralAdministrador.php'; ?>
    </aside>
    <section>
      <legend>Documentos</legend>

        <input type="checkbox" id="button-editar">
        <label for="button-editar" class="lbl-editar">Calificar</label>
        <div class="modal">
          <div class="contenedor">
            <header>
              Agregar nota
            </header>
            <label for="button-editar">X</label>
              <div class="Contenido">
                <form class="" action="../../controladores/?con=PostuladosControlador&fun=calificar" method="post">
                <input type="hidden" name="codigo" value="<?php echo $_GET["usuario"] ?>">
                <input type="text" name="nota" placeholder="Inserte la nota">
                <br>
                <input type="submit" name="calificar" value="calificar" >
                </form>
              </div>
          </div>
        </div>

    <table>
      <tr>
        <th>Documento</th>
        <th>Visualizar</th>
        <th>Descargar</th>
      </tr>

      <?php
      if(file_exists($ruta)){

        $carpeta=opendir($ruta);
        while ($archivo=readdir($carpeta)) {

          if(!is_dir($archivo)){
            ?>
            <tr>
              <td> <?php  echo $archivo ?> </td>
              <td> <a href="<?php echo "$ruta"."/".$archivo;?>" target="_blank">vusualizar</a> </td>
              <td> <a download href="<?php echo "$ruta"."/".$archivo;?>" >Descargar</a>  </td>
            </tr>

            <?php
          }
        }
      } ?>
    </table>

    </section>

    <footer>
      <?php include '../footer.php'; ?>
    </footer>
    </body>
