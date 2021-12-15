<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/UsuarioModelo.php';


/**
 *
 */

class UsuarioControlador
{
  private $model;
  function __construct()
  {
    $this->model=new UsuarioModelo();
  }

  public function agregarUsuario()
  { if(!empty($_POST["codigo_usuario"])&&!empty($_POST["nombre"])&&!empty($_POST["apellidos"])
    &&!empty($_POST["email"])&&!empty($_POST["numero_documento"])&&!empty($_POST["contrasena"])&&!empty($_POST["rol"])) {
      $contrasena=password_hash($_POST["contrasena"],PASSWORD_DEFAULT);
      $usuario=array(
        'codigo_usuario' =>$_POST["codigo_usuario"]  ,
        'nombre' =>$_POST["nombre"],
        'apellidos' =>$_POST["apellidos"],
        'email' =>$_POST["email"],
        'tipoDocumento' =>$_POST["tipoDocumento"],
        'numero_documento' =>$_POST["numero_documento"],
        'contrasena'=>$contrasena,
        'rol'=>$_POST["rol"]
      );


        if ($this->model->agregarUsuario($usuario)>0) {
        header("location:../vistas/modulo/registrar.php?msg=registrado");
        }else {
        header("location:../vistas/modulo/registrar.php?msg=existe");
      }
    }else {
        header("location:../vistas/modulo/registrar.php?msg=incompletos");
    }

  }

  public function listar($codigo='')
  {
    return $this->model->listar($codigo);
  }

  public function recuperarContrasena()
  {
    if(!empty($_POST['codigo']) || !empty($_POST['email'])  ){
      $new_password=rand(99999,999999);
      $password_encripted=password_hash($new_password,PASSWORD_DEFAULT);


      if($this->model->recuperarContrasena($_POST['codigo'],$password_encripted,$_POST['email'])>0){
        $mensaje="su nueva contraseña es: ". $new_password ." Se recomienda realizar el cambio al ingresar";
        $destinatario=$_POST["email"];
        $asunto="contraseña ingreso premio al merito";
        $headers='From: adrean130320@gmail.com' . "\r\n" .
        'Reply-To: adrean130320@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $exito=mail($destinatario,$asunto,$mensaje,$headers);
        if ($exito) {
          header("location:../vistas/modulo/recuperar.php?msg=enviado correctamente");
        }else {
        header("location:../vistas/modulo/recuperar.php?msg=por favor intenta mas tarde");
        }
      }
      else {
        header("location:../vistas/modulo/recuperar.php?msg=datos incorrectos");
      }
    }
    else {
      header("location:../vistas/modulo/recuperar.php");
  }
}
  public function iniciarSesion()
  {
      if (!empty($_POST['codigo']) || !empty($_POST['contrasena'])) {
      $usuario=$this->listar($_POST['codigo']);
                  if (count($usuario)>1 &&  password_verify($_POST["contrasena"], $usuario[0]->contrasena)) {
                  session_start();
                  $_SESSION['usuario']=$_POST['codigo'];
                  $_SESSION['rol']=$usuario[0]->rol;
                  echo $_SESSION['rol'];
                  if($_SESSION['rol']=="Estudiante"||$_SESSION['rol']=="Egresado")
                  {
                    header("location:../vistas/modulo/datosPersonales.php");
                  }
                  else {
                    if($_SESSION['rol']=="administrador"){
                      header("location:../vistas/modulo/historial.php");}
                  }
                } else {
                 header("location:../vistas/modulo/iniciar.php?msg=incorrecto");
                }


      }
        else {
        header("location:../vistas/modulo/iniciar.php?msg=incompletos");
    }

  }
  public function cerrarSesion()
  {
    session_start();
    if(isset($_SESSION['usuario'])){
      session_destroy();
    }
    header("location:../index.php");
  }
  public function editarDatos()
  {
      $editar = array(
      'codigo_usuario'=>$_POST['codigo_usuario'],
      'nombre'=>$_POST['nombre'],
      'apellidos'=>$_POST['apellidos'],
      'email'=>$_POST['email'],
      'numero_documento'=>$_POST['numero_documento'],
      'tipoDocumento'=>$_POST['tipoDocumento']
    );
    $this->model->editarDatos($editar);
    header("location:../vistas/modulo/datosPersonales.php");
}
public function cambiarContrasena()
{
    session_start();
    $usuario=$this->listar($_SESSION["usuario"]);
    if(password_verify($_POST['actual'],$usuario[0]->contrasena) && $_POST['nueva1']==$_POST['nueva2'] ){
        $this->model->cambiarContrasena($_SESSION['usuario'],password_hash($_POST['nueva1'],PASSWORD_DEFAULT));
        if ($_SESSION['rol']!="administrador") {
          header("location:../vistas/modulo/cambiarContrasena.php?msg=cambio exitoso");
        }else {
          header("location:../vistas/modulo/cambiarContrasenaAdmin.php?msg=cambio exitoso");
        }

    }else {
      if ($_SESSION['rol']!="administrador") {
        header("location:../vistas/modulo/cambiarContrasena.php?msg=datos incorrectos");
      }else {
        header("location:../vistas/modulo/cambiarContrasenaAdmin.php?msg=datos incorrectos");
      }
    }
}


}



?>
