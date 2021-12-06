<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/Conexion.php';


/**
 *
 */
class PostuladosModelo extends Conexion
{

  function __construct()
  {
  }

  public function inscribir($postulado = array())
  {
    foreach ($postulado as $key=>$datos) {
      $$key=$datos;
      }

      $sql="insert into postulacion
      (fecha_postulacion,id_convocatoria_categoria,codigo_usuario) SELECT
      :fecha_postulacion,:id_convocatoria_categoria,:codigo_usuario
      FROM dual
      WHERE NOT EXISTS (select * from postulacion
      where id_convocatoria_categoria=:id_convocatoria_categoria && codigo_usuario=:codigo_usuario)
      LIMIT 1
      ";
      $datos=$this->conectar()->prepare($sql);
      $datos->execute(array(":id_convocatoria_categoria"=>$id_convocatoria_categoria,
      ":fecha_postulacion"=>$fecha_postulacion,
      ":codigo_usuario"=>$codigo_usuario));
      $count= $datos->rowcount();
      $datos=null;
      return $count;
  }

  }
?>
