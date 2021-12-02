<?php
require_once '../../controladores/ConvocatoriaCategoriaControlador.php';
require_once '../../controladores/CategoriaControlador.php';
$categoriascon=new ConvocatoriaCategoriaControlador();
$categoria=new CategoriaControlador();
$lista=$categoria->listar($_GET["cat"]);
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

           <tr>
             <th>nombre</th>
          </tr>
         <?php
         for ($i=0; $i <$count-1 ; $i++) {
          ?>
          <tr>
            <td> <a
              href="categoriasActivas.php?id=<?php echo $_GET["id"]; ?>&&cat=<?php echo $listar[$i]->id_categoria ?>">
               <?php echo $listar[$i]->nombre; ?></a></td>
          </tr>
          <?php

         } ?>


          </table>
          <p>
            <?php echo  $lista[0]->descripcion;?>
          </p>
       </section>
       <footer>
         <?php include '../footer.php'; ?>
       </footer>

     </body>
