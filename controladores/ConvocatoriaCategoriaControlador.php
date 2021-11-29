<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/ConvocatoriaCategoriaModelo.php';


/**
 *
 */

class ConvocatoriaCategoriaControlador
{
  private $model;
  function __construct()
  {
    $this->model=new ConvocatoriaCategoriaModelo();
  }

  public function agregar($id_categoria,$id_convocatoria)
  {
      return $this->model->agregar($id_categoria,$id_convocatoria);
    }

  }
