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
    $postulado->inscribir($_GET["cc"]);
    foreach ($_FILES as $archivo=>$algo) {
      echo "<br>".$archivo.$algo["name"]."<br>";

    }
  }
}
