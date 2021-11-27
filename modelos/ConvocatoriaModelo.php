<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class ConvocatoriaModelo extends Conexion
{

  function __construct()
  {
  }

  public function crearConvocatoria($convocatoria=array())
  {
    foreach ($convocatoria as $key=>$datos) {
      $$key=$datos;
      }
      $sql="insert into convocatoria
      (titulo,descripcion,fecha_inicio,fecha_fin)values
      (:titulo,:descripcion,:fecha_inicio,:fecha_fin)";
      $datos=$this->conectar();
      $resultado=$datos->prepare($sql);
      $resultado->execute(array(":titulo"=>$titulo,
      ":descripcion"=>$descripcion,
      ":fecha_inicio"=>$fecha_inicio,
      ":fecha_fin"=>$fecha_fin
    ));
    $id=$datos->lastInsertId();
    $datos=null;
    return $id;
  }

  public function historial()
  {
    $sql="selet * from convocatoria order by id_convocatoria desc";
    $datos=$this->conectar()->prepare($sql);
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {}
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }

}

 ?>
