<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class ConvocatoriaCategoriaModelo extends Conexion
{

  function __construct()
  {
  }

  public function agregar($id_convocatoria,$id_categoria)
  {
      $sql="insert into categoria_convocatoria
      (id_convocatoria,id_categoria)
      SELECT
      :id_convocatoria,:id_categoria
      FROM dual
      WHERE NOT EXISTS (select * from categoria_convocatoria
      where id_categoria=:id_categoria and id_convocatoria=:id_convocatoria)
      LIMIT 1
      ";
      $datos=$this->conectar();
      $resultado=$datos->prepare($sql);
      $resultado->execute(array(":id_convocatoria"=>$id_convocatoria,
      ":id_categoria"=>$id_categoria
    ));
    $id=$datos->lastInsertId();
    $datos=null;
    return $id;
  }
  public function listar($id_convocatoria)
  {
    $sql="SELECT c.* FROM categoria as c JOIN  categoria_convocatoria as cc JOIN convocatoria as co
    on c.id_categoria = cc.id_categoria and co.id_convocatoria=cc.id_convocatoria";

    $datos=$this->conectar()->prepare($sql);
    $datos->execute(array(":id_convocatoria"=>$id_convocatoria));
    while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {

      }
    $datos->closeCursor();
    $datos=null;
    return $filas;
  }
}
