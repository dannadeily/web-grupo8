<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/PostuladosModelo.php';

class PostuladosControlador
{
  private $model;
  function __construct()
  {
    $this->model=new PostuladosModelo();
  }
  public function inscribir($cc)
  {
    session_start();
    $codigo=$_SESSION['usuario'];
    date_default_timezone_set('America/Bogota');
    $fecha=date("Y-m-d");
    $postulado = array('fecha_postulacion' =>$fecha,
    'id_convocatoria_categoria'=>$cc,
    'codigo_usuario'=>$codigo
   );
   return $this->model->inscribir($postulado);
  }



}
?>
