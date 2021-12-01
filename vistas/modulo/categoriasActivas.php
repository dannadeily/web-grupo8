<?php
require_once '../../controladores/ConvocatoriaCategoriaControlador.php';
$categorias=new ConvocatoriaCategoriaControlador();
$listar=$categorias->listar($_GET["id"]);
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
         <table>

           <tr>
             <th>nombre</th>
          </tr>
         <?php
         for ($i=0; $i <$count-1 ; $i++) {
          ?>
          <tr>
            <td> <?php echo $listar[$i]->nombre; ?></td>
          </tr>
          <?php

         } ?>


          </table>
       </section>
       <footer>
         <?php include '../footer.php'; ?>
       </footer>

     </body>
