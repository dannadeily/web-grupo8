<?php

  /**
   *
   */
  class Categoria_modelo
  {
    private $db;
    private $categorias;
    function __construct()
    {
      require_once 'Conexion.php';
      $this->db=Conexion::conectar();
      $this->productos=array();
    }
    function listar(){
      $sql="select * from categoria";
      $consulta=$this->db->query($sql);

      while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->productos[]=$filas;
      }

    return $this->productos;
  }
  }





 ?>
