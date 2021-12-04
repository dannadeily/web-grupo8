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
    //header("location:../vistas/modulo/DocumentosCategoria.php");
  }

}
