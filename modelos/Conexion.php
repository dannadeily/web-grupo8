<?php
//include ($_SERVER['DOCUMENT_ROOT']'/proyecto/config/config.php')
/**
 *
 */
class Conexion
{
  /*$host=DB_HOST;
  $nombre=DB_NOMBRE;
  $usuario=DB_USUARIO;
  $password=DB_PASSWORD;
  $charset=DB_CHARSET;
*/
  public  static  function conectar()
  {
    try {


      $base=new PDO('mysql:host=localhost;dbname=premio','root','');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $base->exec("SET CHARACTER SET UTF8");

    } catch (Exception $e) {
    echo ($e->getLine());
    die($e->getMessage());

    }
  return $base;
  }
}




 ?>
