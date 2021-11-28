<?php
require_once '../../controladores/ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$historial=$convocatoria->convocatoriaVigente();
$count=count($historial);
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
         <?php include 'BarraLateralAdministrador.php'; ?>
       </aside>





     <footer>
         <?php include '../footer.php'; ?>
       </footer>
   </body>
 </html>
