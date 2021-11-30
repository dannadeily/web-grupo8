<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/CategoriaModelo.php';


/**
 *
 */

class CategoriaControlador
{
  private $model;
  function __construct()
  {
    $this->model=new CategoriaModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
  public function estado()
  {
    if ($_GET["estado"]==0) {
      $this->model->estado($_GET["id"],1);
      echo "entra";
    }else {
      $this->model->estado($_GET["id"],0);
    }
    header("location:../vistas/modulo/seleccionarCategoria.php");
  }
  public function crearCategoria()
  {
        if (isset($_POST["continuar"])) {
      $categoria=array(
        'nombre' =>$_POST["nombre"]  ,
        'descripcion' =>$_POST["descripcion"]
      );


        if ($this->model->crearCategoria($categoria)>0) {
         header("location:../vistas/modulo/seleccionarCategoria.php?msg=categoria registrada");
        }else {
        header("location:../vistas/modulo/crearCategoria.php?msg=categoria ya existe");
      }
    }
    else {
      header("location:../vistas/modulo/crearCategoria.php");
    }
  }

}