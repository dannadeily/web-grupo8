<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class DocumentoModelo extends Conexion
{

  function __construct()
  {
  }

  public function guardarDocumento($informacion=array())
  {
    foreach ($informacion as $key=>$datos) {
      $$key=$datos;
      }

      $sql="insert into documento (nombre,descripcion,id_categoria) values (:nombre,:descripcion,:id_categoria)";
      $datos=$this->conectar()->prepare($sql);
      $datos->execute(array('nombre' => $nombre,
      'descripcion'=>$descripcion,
      'id_categoria'=>$id_categoria
     ));
     $afectadas=$datos->rowCount();
     $datos=null;
     return $afectadas;
   }

  public function listar($id='')
  {
    if ($id=='') {
      $sql="select * from documento";
    }else {
        $sql="select * from documento where id_categoria=:id";
    }
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(':id' => $id
   ));
   while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {
   }
   $datos=null;
   return $filas;
  }

  public function borrarDocumento($id)
  {
    $sql="delete  from documento where id_documento=:id_documento";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array('id_documento' => $id));
    $afectadas=$datos->rowCount();
    $datos=null;
    return $afectadas;

  }
}
