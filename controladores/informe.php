<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:../vistas/modulo/iniciar.php");
}
if (empty($_GET["conv"])) {
  header("location:../vistas/modulo/historial.php");
}
require('../pdf/fpdf.php');
require 'ConvocatoriaControlador.php';
$convocatoria=new ConvocatoriaControlador();
$lista=$convocatoria->informe($_GET["conv"]);
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    date_default_timezone_set('America/Bogota');
    $fecha=date("Y-m-d H:i:s");
    $this->Image('../vistas/img/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de inscritos',0,0,'C');
    $this->SetFont('Arial','',8);
    $this->Cell(0,5, $fecha ,0,0,'C');
    // Salto de línea
    $this->Ln(20);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
    $this->Image('../vistas/img/logoufps.png',10,276,21);
}
}

$pdf = new PDF();
$pdf->aliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','b',10);

$categoria="";

for ($i=0; $i <count($lista)-1 ; $i++) {
  if ($lista[$i]->nombre!=$categoria) {
    $categoria=$lista[$i]->nombre;
    $pdf->cell(70,7, $lista[$i]->nombre, 0,1,'C',0);
    $pdf->cell(30,7, "nombres", 1,0,'C',0);
    $pdf->cell(30,7, "apellidos", 1,0,'C',0);
    $pdf->cell(20,7, "codigo", 1,0,'C',0);
    $pdf->cell(60,7, "email", 1,0,'C',0);
    $pdf->cell(20,7, "rol", 1,0,'C',0);
    $pdf->cell(20,7, "postulacion", 1,0,'C',0);
    $pdf->cell(10,7, "nota", 1,1,'C',0);
  }
  $pdf->SetFont('Arial','',10);
  $pdf->cell(30,7, $lista[$i]->nombres, 1,0,'C',0);
  $pdf->cell(30,7, $lista[$i]->apellidos, 1,0,'C',0);
  $pdf->cell(20,7, $lista[$i]->codigo_usuario, 1,0,'C',0);
  $pdf->cell(60,7, $lista[$i]->email, 1,0,'C',0);
  $pdf->cell(20,7, $lista[$i]->rol, 1,0,'C',0);
  $pdf->cell(20,7, $lista[$i]->fecha_postulacion, 1,0,'C',0);
  $pdf->cell(10,7, $lista[$i]->calificacion, 1,1,'C',0);

}

$pdf->Output();
?>
