<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editar datos</title>
    <link rel="stylesheet" href="../css/datosPersonales.css">
  </head>
  <body>

    <section class="caja" id="container"  >
                  <h2>Datos Personales</h1>
                  <hr>
                  <form action="" method="post">
                        <table>
                              <tr>
                            <td>
                              <label for="codigo_usuario">Codigo usuario</label>
                              <input type="number" name="codigo_usuario" id="codigo_usuario" placeholder="codigo usuario" min="0" max="10000000">
                            </td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>
                              <label for="nombre">Nombres</label>
                              <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                            </td>
                            <td>
                              <label for="apellidos">Apellidos</label>
                              <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                            </td>
                          </tr>
                            <tr>
                              <td>  <label for="numero_documento">Numero de documento</label>
                                <input type="number" name="numero_documento" id="numero_documento" placeholder="numero documento" min="0" max="100000000000">
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
                             <input type="email" name="email" id="email" placeholder="Email">
                           </td>
                           <td>  <label for="contrasena">contraseña </label>
                             <input type="password" name="contrasena" id="contrasena" placeholder="contraseña">
                           </td>

                          </tr>


                                      </table>
                      <button class="btn_save" type="button" onclick="location.href='editarUsuario.php'">Editar</button>



    </section>

  </body>
</html>
