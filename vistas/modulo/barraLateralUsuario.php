<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/barraLateralUsuario.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>

    <input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check" ><i class="fas fa-bars"></i></label>
      <div class="left-panel">

<ul>
  <li class="info">
    <a id="lista"> <?php  echo $_SESSION['nombre']." ".$_SESSION['apellidos']; ?> </a>
  </li>

              <li >
                <a id="lista" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/datosPersonales.php">
                  Datos Personales
                </a>
              </li>
          <li >
            <a id="lista" href="<?php $_SERVER["DOCUMENT_ROOT"]?>/web-grupo8/vistas/modulo/convocatoriaAbiertas.php">
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
