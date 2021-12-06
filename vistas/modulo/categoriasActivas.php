<?php
require_once '../../controladores/ConvocatoriaCategoriaControlador.php';
require_once '../../controladores/CategoriaControlador.php';
require_once '../../controladores/DocumentoControlador.php';
session_start();
if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header("location:iniciar.php");
}
$documento=new DocumentoControlador();
$categoriascon=new ConvocatoriaCategoriaControlador();
$categoria=new CategoriaControlador();
if (isset($_GET['cat']) && !empty($_GET['cat'])) {
  $lista=$categoria->listar($_GET["cat"]);
  $documentos=$documento->listar();
  $contarDocumentos=count($documentos);
}


$listar=$categoriascon->listar($_GET["id"]);
$count=count($listar);
 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>convocatorias vigentes</title>
   </head>
   <body>
     <header>
       <?php include '../headerLogin.php'; ?>
     </header>
       <aside class="">
         <?php include 'barraLateralUsuario.php'; ?>

       </aside>
       <section>
         <br>
         <legend>Seleccione categoria</legend>
         <table>


         <?php
         for ($i=0; $i <$count-1 ; $i++) {
          ?>
          <tr>
            <td> <a
              href="categoriasActivas.php?id=<?php echo $_GET["id"]; ?>&&cat=<?php echo $listar[$i]->id_categoria ?>">
               <?php  echo $listar[$i]->nombre; ?></a></td>
          </tr>
          <?php

         } ?>


          </table>

          <article class="">
          <?php if(isset($_GET['cat']) && !empty($_GET['cat'])){ ?>
          <p>
            <?php ?> <h4> <?php echo  $lista[0]->descripcion;?> <h4> <?php?>
            <?php for ($i=0; $i <$contarDocumentos-1 ; $i++) {
              if($_GET['cat']==$documentos[$i]->id_categoria){  ?>
                <h4> <?php echo $documentos[$i]->nombre ; ?> </h4>
                <h5>   <?php echo $documentos[$i]->descripcion ; ?> </h5>


          <?php    }
            } ?>

          </p>
          <button type="button" onclick="location.href='subirDocumentos.php?id=<?php echo $_GET['cat'] ?>'" name="button"> continuar </button>
        <?php } ?>
        </article>
       </section>
       <footer>
         <?php include '../footer.php'; ?>
       </footer>

     </body>
