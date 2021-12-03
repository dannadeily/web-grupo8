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

  public function crearConvocatoria($convocatoria=array())
  {
    foreach ($convocatoria as $key=>$datos) {
      $$key=$datos;
      }
      $sql="insert into documento (nombre,descripcion,id_categoria) values (:nombre,:descripcion,:id_categoria)";
      $datos=$this->conectar->prepare($sql);
      $datos->execute(array('' => ,
      
     ));
    }
}
