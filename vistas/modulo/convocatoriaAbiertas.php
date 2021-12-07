<?php
require_once '../../controladores/ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$historial=$convocatoria->convocatoriasAbiertas();
$count=count($historial);
session_start();
if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header("location:iniciar.php");
}
 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>convocatorias</title>
   </head>
   <body>
     <header>
       <?php include '../headerLogin.php'; ?>
     </header>
       <aside class="">
         <?php include 'BarraLateralUsuario.php'; ?>

       </aside>
       <table>
         <tr>
           <th>Categoria</th>
           <th>descripcion</th>
           <th>fecha de cierre</th>
           <th>acciones</th>

         </tr>

       <section>


       <?php for ($i=0; $i <$count-1 ; $i++) {?>
         <tr>
            <td>   <a href="categoriasActivas.php?id=<?php echo $historial[$i]->id_convocatoria ?>"> <?php echo $historial[$i]->titulo ?> </a> </td>
            <td> <?php echo $historial[$i]->descripcion ?>  </td>
            <td> <?php echo $historial[$i]->fecha_fin ?>  </td>
            <td>      </td>
          </tr>
      <?php } ?>
       </table>
        </section>
     <footer>
         <?php include '../footer.php'; ?>
       </footer>
   </body>
 </html>
