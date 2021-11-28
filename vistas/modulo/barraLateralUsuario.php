<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/barraLateralUsuario.css">
    <title></title>
  </head>
  <body>
      <div class="sidebar">
        <div class="">
          <div class="info">
            <p id="lista"> <?php  echo $_SESSION['nombre']." ".$_SESSION['apellidos']; ?> </p>
          </div>
        </div>
            <ul>
              <li >
                <a id="lista" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/datosPersonales.php">
                  Datos Personales
                </a>
              </li>
          <li >
            <a id="lista" href="<?php $_SERVER["DOCUMENT_ROOT"]?>/web-grupo8/vistas/modulo/"">
              Convocatoria
            </a>
          </li>
          <li>
            <a id="lista" href="#">
              Inscripciones
            </a>
          </li>
          <li >
            <a id="lista" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/cambiarContrasena.php">
              Cambiar Contraseña
            </a>
          </li>
        </ul>
      </div>
  </body>
</html>
