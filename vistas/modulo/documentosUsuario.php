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
