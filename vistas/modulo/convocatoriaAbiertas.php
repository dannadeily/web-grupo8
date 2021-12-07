<?php
require_once '../../controladores/ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$historial=$convocatoria->convocatoriasAbiertas();
$count=count($historial);
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="usuario") {
  header("location:iniciar.php");
}
 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/convocatoriaAbiertas.css">
     <title>convocatorias</title>
   </head>
   <body>
     <header>
       <?php include '../headerLogin.php'; ?>
     </header>
       <aside class="">
         <?php include 'BarraLateralUsuario.php'; ?>

       </aside>

       <section id="container-abierta">

       <table id="customers-abierta">
         <tr>
           <th>Categoria</th>
           <th>descripcion</th>
           <th>fecha de cierre</th>
           <th>acciones</th>

         </tr>

       <?php for ($i=0; $i <$count-1 ; $i++) {?>
         <tr>
            <td>    <?php echo $historial[$i]->titulo ?>  </td>
            <td> <?php echo $historial[$i]->descripcion ?>  </td>
            <td> <?php echo $historial[$i]->fecha_fin ?>  </td>
            <td>  <a href="categoriasActivas.php?id=<?php echo $historial[$i]->id_convocatoria ?> "> seleccionar </a>  </td>
          </tr>
      <?php } ?>
       </table>

        </section>

     <footer>
         <?php include '../footer.php'; ?>
       </footer>
   </body>
 </html>
