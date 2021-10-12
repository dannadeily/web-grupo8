<?php

//$tipo = $_POST['tipo'];
$codigo=$_POST['codigo'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION ['codigo']=$codigo;
include 'db.php';

//if (strcmp($this->tipo,usuario )) {
  $consulta="SELECT * FROM usuario where codigo_usuario='$codigo' and contrasena='$contrasena'";

  $resultado=mysqli_query($conexion,$consulta);

  
  $filas=mysqli_num_rows($resultado);
  if ($filas) {
    header("location:usuario.php");
  }
else{
 ?>
<?php
  include("index.php");
 ?>
<h3 class="bad" >error de autenticacion</h3>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
