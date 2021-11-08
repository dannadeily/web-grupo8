<?php
include ($_SERVER['DOCUMENT_ROOT']'/proyecto/config/config.php')
/**
 *
 */
class Conexion
{

  function conectar()
  {
    try {
      $base=new PDO('mysql:host=localhost;dbname=prueba','root','');
      $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET UTF8");

    } catch (Exception $e) {
      e->getMessage();

    }
  return $base;
  }
}




 ?>
