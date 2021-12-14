<?php
session_start();
if (!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])|| $_SESSION['rol']!="administrador") {
  header("location:../vistas/modulo/iniciar.php");
}
if (empty($_GET["conv"])) {
  header("location:../vistas/modulo/historial.php");
}
require('../pdf/fpdf.php');
require_once 'ConvocatoriaControlador.php';
$convocatoria= new ConvocatoriaControlador();
$ganadores=$convocatoria->ganadores($_GET["conv"]);
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
    $this->Cell(30,10,'Reporte de ganadores',0,0,'C');
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

$pdf->cell(20,7, "Codigo", 1,0,'C',0);
$pdf->cell(30,7, "Nombres", 1,0,'C',0);
$pdf->cell(30,7, "Apellidos", 1,0,'C',0);
$pdf->cell(60,7, "Categoria", 1,0,'C',0);
$pdf->cell(20,7, "usuario", 1,0,'C',0);
$pdf->cell(15,7, "nota", 1,1,'C',0);

for ($i=0; $i <count($ganadores)-1 ; $i++) {
  $pdf->SetFont('Arial','',10);
  $pdf->cell(20,7, $ganadores[$i]->codigo_usuario, 1,0,'C',0);
  $pdf->cell(30,7, $ganadores[$i]->nombres, 1,0,'C',0);
  $pdf->cell(30,7, $ganadores[$i]->apellidos, 1,0,'C',0);
  $pdf->cell(60,7, $ganadores[$i]->nombre, 1,0,'C',0);
  $pdf->cell(20,7, $ganadores[$i]->rol, 1,0,'C',0);
  $pdf->cell(15,7, $ganadores[$i]->calificacion, 1,1,'C',0);

}

$pdf->Output();
?>
