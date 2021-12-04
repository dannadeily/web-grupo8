<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/DocumentoModelo.php';


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
    echo "entra";
    echo $_GET['id'];
    echo $_GET['idDoc'];
    if (!empty($_GET['idDoc'])) {
      echo "aca entra";
       $this->model->borrar($_GET['idDoc']);
    //  header("location:../vistas/modulo/DocumentosCategoria.php?id=".$_GET['id']);
    }else {
    //  header("location:../vistas/modulo/DocumentosCategoria.php?id=");
    }

  }

}
