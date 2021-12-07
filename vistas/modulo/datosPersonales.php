<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/UsuarioControlador.php';
$usuario=new UsuarioControlador();
session_start();
 if(!isset($_SESSION['usuario'])||$_SESSION['rol']!="usuario"){
    header("location:iniciar.php");
}

$datos=$usuario->listar($_SESSION['usuario']);
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editar datos</title>
    <link rel="stylesheet" href="../css/datosPersonales.css">

  </head>
  <header>
    <?php include '../HeaderLogin.php'?>
  </header>
  <body >

            <aside class="barra-menu">
            <?php include 'BarraLateralUsuario.php'; ?>
          </aside>

    <section class="caja" id="container"  >
                  <h2>Datos Personales</h2>
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
        <footer>
          <?php require '../footer.php'; ?>
        </footer>
  </body>
</html>
