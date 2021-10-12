<?php
  require_once '../modelo/registrousuario.php';
      if(!empty($_POST))
        {
          $alert='';
          if(empty($_POST['codigo_usuario'] || empty($_POST['nombre'])) || empty($_POST['apellidos'])
           || empty($_POST['email']) || empty($_POST['contrasena']) || empty($_POST['tipoDocumento']) || empty($_POST['numero_documento'] ))
          {
            $alert='<p class="msg_error"> todos los campos son abligatorios.</p>';

          }else {
            include "bd.php";

            $codigo_usuario = $_POST['codigo_usuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numero_documento = $_POST['numero_documento'];


            $query= mysqli_query($conexion,"SELECT * FROM usuario WHERE codigo_usuario = '$codigo_usuario' or email='$email'");
            $result =mysqli_fetch_array($query);

            if($result >0 ){
              $alert ='<p class="msg_error">el correo o el usuario ya existe.</p>';
            }else{

              $query_insert = mysqli_query($conexion,"INSERT INTO usuario(codigo_usuario,nombre,apellidos,email,contrasena,tipoDocumento,numero_documento)
                                                                   VALUES('$codigo_usuario','$nombre','$apellidos','$email','$email','$tipoDocumento','$numero_documento')");

                  if($query_insert){
                    $alert ='<p class="msg_save">Usuario creado correctamente.</p>';
                    
                  }else{
                    $alert='<p class="msg_error">Error al crear usuario.</p>';
                  }
            }

          }
        }
 ?>
