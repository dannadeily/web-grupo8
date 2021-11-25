<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/UsuarioControlador.php';
$usuario=new UsuarioControlador();
  session_start();
if (isset($_SESSION['usuario'])) {
  $datos=$usuario->listar($_SESSION['usuario']);
}
else {
  header("location:iniciar.php");
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editar datos</title>
    <link rel="stylesheet" href="../css/editarDatos.css">
  </head>
  <body>

          <header>
            <?php include '../HeaderLogin.php'?>
          </header>
          <aside class="">
              <?php include 'BarraLateralUsuario.php'; ?>
          </aside>
    <section id="container"  >
              <div class="form_register">
                  <h2>Datos Personales</h1>
                  <hr>
                  <form action="" method="post">
                        <table>
                          <tr>
                            <td>
                              <label for="nombre">Nombres</label>
                              <input type="text" name="nombre" id="nombre" value="<?php echo $datos[0]->nombre; ?>">
                            </td>
                            <td>
                              <label for="apellidos">Apellidos</label>
                              <input type="text" name="apellidos" id="apellidos" value="<?php echo $datos[0]->apellidos; ?>">
                            </td>
                          </tr>
                            <tr>
                              <td>  <label for="numero_documento">Numero de documento</label>
                                <input type="number" name="numero_documento" id="numero_documento" value="<?php echo $datos[0]->numero_documento; ?>" min="0" max="100000000000">
                              </td>
                              <td>
                              <label for="tipoDocumento">Tipo de documento</label>
                               <select class="select" name="tipoDocumento" id="tipoDocumento">
                                        <option value="1"> Cedula de ciudadania</option>
                                        <option value="2"> Tarjeta de identidad</option>
                                        <option value="3"> Cedula de extranjeria</option>
                                          </select>
                                      </td>
                            </tr>
                          <tr>
                            <td> <label for="email">Correo electronico</label>
                             <input type="email" name="email" id="email" value="<?php echo $datos[0]->email; ?>">
                           </td>
                          </tr>


                                      </table>
                      <input type="submit" value="Guardar cambios" class="btn_save">

                   </form>

             </div>


    </section>
<br>
<br>
        <footer>
          <?php require '../footer.php'; ?>
        </footer>
  </body>
</html>
