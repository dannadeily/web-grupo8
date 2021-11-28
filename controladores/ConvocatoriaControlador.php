<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/ConvocatoriaModelo.php';


/**
 *
 */

class ConvocatoriaControlador
{
  private $model;
  function __construct()
  {
    $this->model=new ConvocatoriaModelo();
  }

  public function crearConvocatoria()
  {
        if (isset($_POST["enviar"])) {
        if($_POST["fecha_inicio"]<$_POST["fecha_fin"]){

        $convocatoria=array(
        'titulo' =>$_POST["titulo"]  ,
        'descripcion' =>$_POST["descripcion"],
        'fecha_inicio' =>$_POST["fecha_inicio"],
        'fecha_fin' =>$_POST["fecha_fin"]
      );
      $id=$this->model->crearConvocatoria($convocatoria);
        if ($id>0) {
        if($_FILES["imagen"]["error"]){
          echo "error";
        }else {
          $permitidos=array("image/png","image/jpg","image/jpeg","image/gif");
          $limite_kb=5000;

          if(in_array($_FILES["imagen"]["type"],$permitidos) && $_FILES["imagen"]["size"]<$limite_kb*1024){
            $ruta="../vistas/imgConvocatorias/".$id."/";
            $extencion=strtolower(pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION));
            $archivo=$ruta.$id.".".$extencion;
            if (!file_exists($ruta)) {
              mkdir($ruta);
            }
            if (!file_exists($archivo)) {
              $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
              if ($resultado) {

              }else {
                echo "error al guardar";
              }
            }

          }
          else {
            echo "archivo no permitido o excede el tamaño de 5mb";
          }

        }
         header("location:../vistas/modulo/historial.php?msg=creada con exito");
        }else {
       header("location:../vistas/modulo/crearConvocatoria.php?msg=no se pudo crear");
      }
    }
    else {
      header("location:../vistas/modulo/crearConvocatoria?msg=fecha de inicio debe ser mayor a la de fin");
    }
    }
    else {
       header("location:../vistas/modulo/crearConvocatoria?msg=complete los datos.php");
    }
  }

  public function historial()
  {
    return $this->model->historial();
  }

//terminar editar convocatorias
/*public function editarConvocatoria()
{
      if (isset($_POST["enviar"])) {
      if($_POST["fecha_inicio"]<$_POST["fecha_fin"]){

      $convocatoria=array(
      'titulo' =>$_POST["titulo"]  ,
      'descripcion' =>$_POST["descripcion"],
      'fecha_inicio' =>$_POST["fecha_inicio"],
      'fecha_fin' =>$_POST["fecha_fin"]
    );
    $id=$this->model->crearConvocatoria($convocatoria);
      if ($id>0) {
      if($_FILES["imagen"]["error"]){
        echo "error";
      }else {
        $permitidos=array("image/png","image/jpg","image/jpeg","image/gif");
        $limite_kb=5000;

        if(in_array($_FILES["imagen"]["type"],$permitidos) && $_FILES["imagen"]["size"]<$limite_kb*1024){
          $ruta="../vistas/imgConvocatorias/".$id."/";
          $extencion=strtolower(pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION));
          $archivo=$ruta.$id.".".$extencion;
          if (!file_exists($ruta)) {
            mkdir($ruta);
          }
          if (!file_exists($archivo)) {
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {

            }else {
              echo "error al guardar";
            }
          }

        }
        else {
          echo "archivo no permitido o excede el tamaño de 5mb";
        }

      }
        header("location:../vistas/modulo/historial.php?msg=creada con exito");
      }else {
        header("location:../vistas/modulo/crearConvocatoria.php?msg=no se pudo crear");
    }
    }
    else {
      header("location:../vistas/modulo/crearConvocatoria?msg=fecha de inicio debe ser mayor a la de fin");
  }
  }
    else {
     header("location:../vistas/modulo/crearConvocatoria?msg=complete los datos.php");
   }
 }*/

public function convocatoriaVigente()
{
  $hoy= date("Y-m-d");

   var_dump($this->model->convocatoriaVigente($hoy));
}


}
