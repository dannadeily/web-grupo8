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

  public function historial($id="")
  {
    if($id==""){
    $sql="select * from convocatoria order by id_convocatoria desc";
  }else {
    $sql="select * from convocatoria where id_convocatoria=$id";
  }
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }

  public function editar($convocatoria=array())
  {
    foreach ($convocatoria as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update convocatoria set titulo=:titulo,descripcion=:descripcion,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin
    where  id_convocatoria=:id_convocatoria";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(
      ":id_convocatoria"=>$id_convocatoria,
      ":titulo"=>$titulo,
      ":descripcion"=>$descripcion,
      ":fecha_inicio"=>$fecha_inicio,
      ":fecha_fin"=>$fecha_fin
      ));
      $count=$datos->rowCount();
      $datos=null;
      return $count;
  }

  public function convocatoriaVigente($fecha)
  {

    $sql="SELECT * FROM convocatoria WHERE '$fecha' < fecha_fin";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }
}

 ?>
