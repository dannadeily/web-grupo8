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
     <link rel="stylesheet" href="../css/convocatoriaVigente.css">

     <title>convocatorias vigentes</title>
   </head>
   <body>
     <header>
       <?php include '../headerLogin.php'; ?>
     </header>
       <aside class="">
         <?php include 'BarraLateralAdministrador.php'; ?>

       </aside>

       <section id="container-Vigente">
         <legend>Editar Convocatoria</legend>
         <br>
         <hr>
       <table id="customers-Vigente">
         <tr>
           <th>titulo</th>
           <th>descripcion</th>
           <th>fecha de inicio</th>
           <th>fecha de fin</th>
           <th>editar</th>
         </tr>




       <?php for ($i=0; $i <$count-1 ; $i++) {?>
         <tr>
            <td> <?php echo $historial[$i]->titulo ?>  </td>
            <td> <?php echo $historial[$i]->descripcion ?>  </td>
            <td> <?php echo $historial[$i]->fecha_inicio ?>  </td>
            <td> <?php echo $historial[$i]->fecha_fin ?>  </td>
            <td>   <button onclick="location.href='editarConvocatoria.php?id=<?php echo $historial[$i]->id_convocatoria; ?>'"> <abbr title="Editar"><i class="fas fa-edit"></i></abbr> </button>                 </td>
          </tr>
      <?php } ?>
         </table>
        </section>

     <footer>
         <?php include '../footer.php'; ?>
       </footer>
   </body>
 </html>
