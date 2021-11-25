
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Registro</title>
    <link rel="stylesheet" href="../css/registrar.css">
  </head>
  <body>
    <header>
    <?php   require '../headerLogin.php';?>
    </header>

<section id="container"  >
  <?php  if(isset($_GET["msg"])) {  ?>
    <h3><?php echo $_GET["msg"] ;?></h3>
  <?php  } ?>
          <div class="form_register">
              <h2>Registro usuario</h2>

              <hr>


               <form action="../../controladores/?con=UsuarioControlador&fun=agregarUsuario" method="post">
                 <div class="fila1">
                    <label for="codigo_usuario">Codigo usuario</label>
                    <input type="number" name="codigo_usuario" id="codigo_usuario" placeholder="codigo usuario" required>
                  </div>
                  <div class="fila2">
                 <label for="nombre">Nombres</label>
                 <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                 </div>
                 <div class="fila1">
                 <label for="apellidos">Apellidos</label>
                 <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>
               </div>
               <div class="fila2">
                 <label for="email">Correo electronico</label>
                 <input type="email" name="email" id="email" placeholder="Email" required>
               </div>
                 <div class="fila1">
                 <label for="tipoDocumento">Tipo de documento</label>
                 <select name="tipoDocumento" id="tipoDocumento">
                          <option value="1"> Cedula de ciudadania</option>
                          <option value="2"> Tarjeta de identidad</option>
                          <option value="3"> Cedula de extranjeria</option>
                  </select>
                   </div>
                   <div class="fila2">
                  <label for="numero_documento">Numero de documento</label>
                  <input type="number" name="numero_documento"  placeholder="numero documento" required>
                  <div>
                  <label for="contrasena">contraseña </label>
                  <input type="password" name="contrasena"  placeholder="contraseña" required>
                  <br>
                  <input  type="submit" value="registrar" name="registrar"class="btn_save">



               </form>

         </div>


</section>


      <?php   require '../footer.php';?>
    </footer>

  </body>
</html>
