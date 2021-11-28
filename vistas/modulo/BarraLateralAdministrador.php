<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/BarraLateralAdministrador.css">
    <title></title>
  </head>
  <body>
      <div class="sidebar">
        <div class="toggle-btn">
          <div class="info">
            <p id="barra">nombre del administrador</p>
          </div>
        </div>


          <li class="">
            <a href="#" id="barra">
              Informacion convocatoria
              <i class="fas fa-angle-down pull-right">
              </i>
            </a>
            <ul class="treeview-menu">
              <li class="">


                      <a id="barra" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/crearConvocatoria.php">
                        Crear Convocatoria
                  </a>
              </li>
              <li class="">

                  <a id="barra" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/convocatoriaVigente.php">
                      Editar Convocatoria
                  </a>
              </li>
              <li class="">

                  <a id="barra" href="#">
                      Calificar
                  </a>
              </li>
              <li id="barra" class="">

                  <a href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/historial.php">
                      historial
                  </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a id="barra" href="#">
              Categorias
              <i class="fa fa-angle-left pull-right">

              </i>
            </a>
            <ul class="treeview-menu menu open">
              <li id="barra" class="">
                  <a href="#">
                      Crear Categoria
                  </a>
              </li>
              <li class="">

                  <a id="barra" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/seleccionarCategoria.php">
                      Editar Categoria
                  </a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a id="barra" href="#">
              Gererar Informe
            </a>
          </li>
          <li class="treeview">
            <a id="barra" href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/cambiarContrasenaAdmin.php">
              Cambiar Contraseña
            </a>
          </li>
        </ul>
      </div>
  </body>
</html>
