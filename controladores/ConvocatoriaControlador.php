<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/modelos/ConvocatoriaModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/ConvocatoriaCategoriaControlador.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/web-grupo8/controladores/CategoriaControlador.php';


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
            $ruta="../vistas/imgConvocatorias/";
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
        //crear convocatoria con las categorias activas
        $categorias=new CategoriaControlador();
        $lista=$categorias->listar();
        $listaCount=count($lista);

        $convocatoriacategoria=new ConvocatoriaCategoriaControlador();
        for ($i=0; $i <$listaCount-1 ; $i++) {
          if ($lista[$i]->estado==1) {
            $convocatoriacategoria->agregar($lista[$i]->nombre,$id,$lista[$i]->id_categoria,$lista[$i]->rol);
          }


        }
         header("location:../vistas/modulo/historial.php?msg=creada con exito");
        }else {
       header("location:../vistas/modulo/crearConvocatoria.php?msg=no se pudo crear");
      }
    }
    else {
      header("location:../vistas/modulo/crearConvocatoria.php?msg=fecha de inicio debe ser mayor a la de fin");
    }
    }
    else {
       header("location:../vistas/modulo/crearConvocatoria.php?msg=complete los datos.php");
    }
  }

  public function historial($id="")
  {
    return $this->model->historial($id);
  }

//terminar editar convocatorias
public function editarConvocatoria()
{
      if (isset($_POST["enviar"])) {
      if($_POST["fecha_inicio"]<$_POST["fecha_fin"]){
      $convocatoria=array(
      'id_convocatoria'=>$_POST["id"],
      'titulo' =>$_POST["titulo"],
      'descripcion' =>$_POST["descripcion"],
      'fecha_inicio' =>$_POST["fecha_inicio"],
      'fecha_fin' =>$_POST["fecha_fin"]
    );
    $this->model->editar($convocatoria);
    if (!isset($_POST["imagen"])) {
      header("location:../vistas/modulo/historial.php?msg=actualizada con exito 1");
    }

      if($_FILES["imagen"]["error"]){
        echo "error";
      }else {
        $permitidos=array("image/png","image/jpg","image/jpeg","image/gif");
        $limite_kb=5000;

        if(in_array($_FILES["imagen"]["type"],$permitidos) && $_FILES["imagen"]["size"]<$limite_kb*1024){
          $ruta="../vistas/imgConvocatorias/";
          $extencion=strtolower(pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION));
          $archivo=$ruta.$_POST["id"].".".$extencion;
          if (!file_exists($ruta)) {
            mkdir($ruta);
          }
          if (!file_exists($archivo)) {
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
            }else {
              echo "error al guardar";
            }
          }else {
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
          }

        }
        else {
          echo "archivo no permitido o excede el tamaño de 5mb";
        }


        header("location:../vistas/modulo/historial.php?msg=actualizada con exito");
}
    }
    else {
      header("location:../vistas/modulo/editarConvocatoria.php?msg=fecha de inicio debe ser mayor a la de fin");
    }
  }
    else {
     header("location:../vistas/modulo/editarConvocatoria.php?msg=complete los datos.php");
   }
 }

  public function convocatoriasAbiertas()
  {
    date_default_timezone_set('America/Bogota');
    $hoy= date("Y-m-d");
    return ($this->model->convocatoriasAbiertas($hoy));
  }
  public function convocatoriaVigente()
  {
    date_default_timezone_set('America/Bogota');
    $hoy= date("Y-m-d");
    return ($this->model->convocatoriaVigente($hoy));
  }
  public function diasRestantes($cierre)
  { date_default_timezone_set('America/Bogota');
    $cierre=date('Y-m-d',strtotime($cierre.'+ 1 month'));
    $hoy= date("Y-m-d");
    $datetime1 = new DateTime("$cierre");
    $datetime2 = new DateTime("$hoy");
    $interval = $datetime1->diff($datetime2);
    return $interval->days . ' dias ';
  }

}
