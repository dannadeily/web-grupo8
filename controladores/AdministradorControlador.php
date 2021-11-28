<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/AdministradorModelo.php';


/**
 *
 */

class AdministradorControlador
{
  private $model;
  function __construct()
  {
    $this->model=new AdministradorModelo();
  }

  public function listar($codigo)
  {
    return $this->model->listar($codigo);
  }


  public function iniciarSesion()
  {
      if (!empty($_POST['codigo']) || !empty($_POST['contrasena'])) {
      $administrador   =$this->listar($_POST['codigo']);
                  if (count($administrador)>1 &&  password_verify($_POST["contrasena"], $administrador[0]->contrasena)) {
                  session_start();
                  echo "entra";
                  $_SESSION['usuario']=$_POST['codigo'];
                  $_SESSION['nombre']=$administrador[0]->nombre;
                  $_SESSION['apellidos']=$administrador[0]->apellidos;
                  $_SESSION['contrasena']=$administrador[0]->contrasena;
                  header("location:../vistas/modulo/historial.php");
                } else {
                  header("location:../vistas/modulo/iniciarAdmin.php?msg=datos incorrectos");
                }


      }
        else {
        header("location:../vistas/modulo/iniciarAdmin.php");
    }

  }
  public function cambiarContrasena()
  {
      session_start();
      if(password_verify($_POST['actual'],$_SESSION['contrasena']) && $_POST['nueva1']==$_POST['nueva2'] ){
          $this->model->cambiarContrasena($_SESSION['usuario'],password_hash($_POST['nueva1'],PASSWORD_DEFAULT));
          header("location:../vistas/modulo/cambiarContrasenaAdmin.php?msg=cambio exitoso");
      }else {
        header("location:../vistas/modulo/cambiarContrasenaAdmin.php?msg=datos incorrectos");
      }
  }
  public function recuperarContrasena()
  {
    if(!empty($_POST['codigo']) || !empty($_POST['email'])  ){
      $new_password=rand(99999,999999);
      $password_encripted=password_hash($new_password,PASSWORD_DEFAULT);


      if($this->model->recuperarContrasena($_POST['codigo'],$password_encripted,$_POST['email'])>0){
        echo "entra";
        $mensaje="su nueva contraseña es: ". $new_password ." Se recomienda realizar el cambio al ingresar";
        $destinatario=$_POST["email"];
        $asunto="contraseña ingreso premio al merito";
        $headers='From: adrean130320@gmail.com' . "\r\n" .
        'Reply-To: adrean130320@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $exito=mail($destinatario,$asunto,$mensaje,$headers);
        if ($exito) {
          header("location:../vistas/modulo/recuperarAdmin.php?msg=enviado correctamente");
        }else {
        header("location:../vistas/modulo/recuperarAdmin.php?msg=por favor intenta mas tarde");
        }
      }
      else {
       header("location:../vistas/modulo/recuperarAdmin.php?msg=datos incorrectos");
      }
    }
    else {
      header("location:../vistas/modulo/recuperarAdmin.php");
          }
    }

}
