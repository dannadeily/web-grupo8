<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class AdministradorModelo extends Conexion
{

  function __construct()
  {
  }
  public function listar($codigo_administrador)
  {
    $sql="select * from administrador where codigo_administrador=:codigo_administrador" ;
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":codigo_administrador"=>$codigo_administrador));
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }
  public function cambiarContrasena($codigo,$contrasena)
  {
    $sql="update administrador set contrasena=:contrasena where codigo_administrador=:codigo_administrador";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":contrasena"=>$contrasena,
    ":codigo_administrador"=>$codigo));
  }
  public function recuperarContrasena($codigo_administrador,$contrasena,$email)
  {
    $sql="update administrador set contrasena=:contrasena where codigo_administrador=:codigo_administrador and email=:email";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":codigo_administrador"=>$codigo_administrador,
    ":contrasena"=>$contrasena,
    ":email"=>$email));
     $datos->closeCursor();

    return $datos->rowCount();
  }
}
