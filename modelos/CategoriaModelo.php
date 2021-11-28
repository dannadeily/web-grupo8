<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class CategoriaModelo extends Conexion
{

  function __construct()
  {
  }
  public function listar()
  {
    $sql="select * from categoria" ;
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }
public function estado($id,$estado)
{
  echo "$estado <br>";
  echo "$id <br>";
    $sql="update categoria set estado=:estado where id_categoria=:id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(
      ":estado"=>$estado,
      ":id"=>$id
    ));
}



}
