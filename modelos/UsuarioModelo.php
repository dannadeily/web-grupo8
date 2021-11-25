<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';

/**
 *
 */
class UsuarioModelo extends Conexion
{

  function __construct()
  {
  }

  public function agregarUsuario($usuario = array())
  {
    foreach ($usuario as $key=>$datos) {
      $$key=$datos;
      }

      $sql="insert into usuario
      (codigo_usuario,nombre,apellidos,email,contrasena,
      tipoDocumento,numero_documento) SELECT
      :codigo_usuario,:nombre,:apellidos,:email,:contrasena,
      :tipoDocumento,:numero_documento
      FROM dual
      WHERE NOT EXISTS (select * from usuario
      where codigo_usuario=:codigo_usuario or email=:email or
      numero_documento=:numero_documento )
      LIMIT 1
      ";
      $datos=$this->conectar()->prepare($sql);
      $datos->execute(array(":codigo_usuario"=>$codigo_usuario,
    ":nombre"=>$nombre,
    ":apellidos"=>$apellidos,
    ":email"=>$email,
    ":contrasena"=>$contrasena,
    ":tipoDocumento"=>$tipoDocumento,
    ":numero_documento"=>$numero_documento));
    $datos->closeCursor();
    $count= $datos->rowcount();
    $datos=null;
    return $count;
  }

  public function listar($codigo_usuario='')
  {
    if ($codigo_usuario=='') {
      $sql="select * from usuario";
    }else {
      $sql="select * from usuario where codigo_usuario=:codigo_usuario" ;
   }
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":codigo_usuario"=>$codigo_usuario));
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {

      }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }

  public function recuperarContrasena($codigo_usuario,$contrasena,$email)
  {
    $sql="update usuario set contrasena=:contrasena where codigo_usuario=:codigo_usuario and email=:email";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":codigo_usuario"=>$codigo_usuario,
    ":contrasena"=>$contrasena,
    ":email"=>$email));
     $datos->closeCursor();

    return $datos->rowCount();
  }
  public function editarDatos($usuario=array())
  {
    foreach ($usuario as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update usuario set nombre=:nombre,
    apellidos=:apellidos,
    numero_documento=:numero_documento,
    tipoDocumento=:tipoDocumento,
    email=:email";
    $datos->execute(array(":email"=>$email,
    ":nombre"=>$nombre,
    ":apellidos"=>$apellidos,
    ":numero_documento"=>$numero_documento,
    ":tipoDocumento"=>$tipoDocumento
    ));
  }

}



 ?>
