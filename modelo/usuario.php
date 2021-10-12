<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">

      <link rel="stylesheet" href="registro_usuario.css">
      <?php include "Header.php"; ?>
</head>
<body>

      <title> Registro Usuario</title>
      <section id="container">
                <div class="form_register">
                    <h1>Registro usuario</h1>
                    <hr>
                    <div class="alert"><?php echo isset($alert) ? $alert : '';?> </div>

                     <form action="registro_usuario.php" method="post">
                       <label for="codigo_usuario">Codigo usuario</label>
                       <input type="number" name="codigo_usuario" id="codigo_usuario" placeholder="codigo usuario" min="0" max="10000000">
                       <label for="nombre">Nombres</label>
                       <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                       <label for="apellidos">Apellidos</label>
                       <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                       <label for="email">Correo electronico</label>
                       <input type="email" name="email" id="email" placeholder="Email">
                       <label for="tipoDocumento">Tipo de documento</label>
                       <select name="tipoDocumento" id="tipoDocumento">
                                <option value="1"> Cedula de ciudadania</option>
                                <option value="2"> Tarjeta de identidad</option>
                                <option value="3"> Cedula de extranjeria</option>
                        </select>
                        <label for="numero_documento">Numero de documento</label>
                        <input type="number" name="numero_documento" id="numero_documento" placeholder="numero documento" min="0" max="100000000000">
                        <label for="contrasena">contraseña </label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="contraseña">
                        <input type="submit" value="Crear usuario" class="btn_save">
                        <input type="reset" name="reset" id="reset">


                     </form>

               </div>


      </section>
      <?php include "Footer.php"; ?>
</body>
</html>
