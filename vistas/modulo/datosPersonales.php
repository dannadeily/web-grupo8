<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/UsuarioControlador.php';
$usuario=new UsuarioControlador();
session_start();

$datos=$usuario->listar($_SESSION['usuario']);
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editar datos</title>
    <link rel="stylesheet" href="../css/datosPersonales.css">
  </head>
  <body>
  <?php if(!isset($_SESSION['usuario'])){
      header("location:iniciar.php");
        }
        ?>

          <header>
            <?php include '../HeaderLogin.php'?>
          </header>

          <aside class="">
            <?php include 'BarraLateralUsuario.php'; ?>
          </aside>
    <section class="caja" id="container"  >
                  <h2>Datos Personales</h1>
                  <hr>
                        <table>
                              <tr>
                                  <td>
                                      <h4>Codigo usuario: </h4>
                                      <p class="datos"> <?php echo $datos[0]->codigo_usuario ?></p>
                                  </td>
                                  <td></td>
                             </tr>
                             <tr>
                                  <td>
                                      <h4>Nombres: </h4>
                                      <p class="datos"><?php echo $datos[0]->nombre ?></p>
                                </td>
                                 <td>
                                   <h4>Apellidos: </h4>
                                   <p class="datos"><?php echo $datos[0]->apellidos ?></p>
                                </td>
                           </tr>
                           <tr>
                               <td>
                                 <h4>Numero de documento: </h4>
                                 <p class="datos"> <?php echo $datos[0]->numero_documento ?>  </p>
                               </td>
                               <td>
                                 <h4>Tipo de documento: </h4>
                                 <p class="datos"> <?php echo $datos[0]->tipoDocumento ?> </p>
                               </td>
                             </tr>
                             <tr>
                                <td>
                                    <h4>Correo electronico: </h4>
                                    <p class="datos"> <?php echo $datos[0]->email ?> </p>
                                  </td>

              </tr>


                </table>

                      <button class="button" onclick="location.href='editarDatos.php'">Editar</button>

    </section>
<br>
<br>
        <footer>
          <?php require '../footer.php'; ?>
        </footer>
  </body>
</html>
