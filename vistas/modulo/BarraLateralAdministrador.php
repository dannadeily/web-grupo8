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
            <p>nombre del administrador</p>
          </div>
        </div>


          <li class="">
            <a href="#">
              Informacion convocatoria
              <i class="fas fa-angle-down pull-right">
              </i>
            </a>
            <ul class="treeview-menu">
              <li class="">

                  <a href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/crearConvocatoria.php">
                      Crear Convocatoria
                  </a>
              </li>
              <li class="">

                  <a href="#">
                      Editar Convocatoria
                  </a>
              </li>
              <li class="">

                  <a href="#">
                      Calificar
                  </a>
              </li>
              <li class="">

                  <a href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/historial.php">
                      historial
                  </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="#">
              Categorias
              <i class="fa fa-angle-left pull-right">

              </i>
            </a>
            <ul class="treeview-menu menu open">
              <li class="">
                  <a href="#">
                      Crear Categoria
                  </a>
              </li>
              <li class="">

                  <a href="#">
                      Editar Categoria
                  </a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              Gererar Informe
            </a>
          </li>
          <li class="treeview">
            <a href=<?php $_SERVER["DOCUMENT_ROOT"]?>"/web-grupo8/vistas/modulo/cambiarContrasenaAdmin.php">
              Cambiar Contraseña
            </a>
          </li>
        </ul>
      </div>
  </body>
</html>
