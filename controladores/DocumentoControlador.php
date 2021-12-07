<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/DocumentoModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/PostuladosControlador.php';

/**
 *
 */

class DocumentoControlador
{
  private $model;
  function __construct()
  {
    $this->model=new DocumentoModelo();
  }

  public function listar($id='')
  {
    return $this->model->listar($id);
  }

  public function guardarDocumento()
  {

    $documentos=array('id_categoria' =>$_POST['id'],
    'nombre'=>$_POST['nombre'],
    'descripcion'=>$_POST['descripcion']
    );
   $this->model->guardarDocumento($documentos);
    header("location:../vistas/modulo/DocumentosCategoria.php?id=$id_categoria");
  }

  public function borrarDocumento()
  {

    if (!empty($_GET['idDoc'])&&!empty($_GET['id'])) {
       $this->model->borrarDocumento($_GET['idDoc']);
       header("location:../vistas/modulo/DocumentosCategoria.php?id=".$_GET['id']);
    }else {
        header("location:../vistas/modulo/DocumentosCategoria.php?id=");
    }

  }
  public function guardarArchivo( )
  {

    $postulado=new PostuladosControlador();
    session_start();
    $codigo=$_SESSION['usuario'];
    $permitidos="application/pdf";
    $limite_kb=5000;
    foreach ($_FILES as $archivo=>$atributo) {
      if($atributo["type"]==$permitidos && $atributo["size"]<$limite_kb*1024){
      $ruta="../documentos/".$_GET["co"]."/".$_GET["cat"]."/".$codigo."/";
      $extencion=strtolower(pathinfo($atributo["name"],PATHINFO_EXTENSION));
      $archivo=$ruta.$archivo.".".$extencion;
      echo "$archivo";
      if (!file_exists($ruta)) {
        mkdir($ruta);
      }
      if (!file_exists($archivo)) {
        $resultado=move_uploaded_file($atributo["tmp_name"],$archivo);
    }
  }

}
  $postulado->inscribir($_GET["cc"]);
  header("location:../vistas/modulo/inscripciones.php");
}
}
