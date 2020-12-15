<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('REPORTE DE PRÉSTAMOS'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->SetFont('Arial','B',10);
    $this->Cell(10, 10,'ID', 1, 0, 'C', 0);
	$this->Cell(60, 10,utf8_decode('Título'), 1, 0, 'C', 0);
	$this->Cell(30, 10, 'Usuario', 1, 0, 'C', 0);
	$this->Cell(30, 10,utf8_decode('Préstamo'), 1, 0, 'C', 0);
	$this->Cell(30, 10,utf8_decode('Devolución'), 1, 0, 'C', 0);
	$this->Cell(18, 10, 'Cantidad', 1, 0, 'C', 0);
	$this->Cell(15, 10, 'Estado', 1, 1, 'C', 0);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');

}
}

 require_once "BD/conexionBD.php";
		$consulta='SELECT prestamos.idPrestamo, prestamos.idLibroPrestamo, libros.titulo, prestamos.idUsuarioPrestamo, usuarios.nombreUs, usuarios.apellidoUs, usuarios.carnet, prestamos.fechaPrestamo, prestamos.fechaEntrega, prestamos.estadoPrestamo, prestamos.cantidad FROM prestamos INNER JOIN libros ON prestamos.idLibroPrestamo=libros.idLibro INNER JOIN usuarios ON prestamos.idUsuarioPrestamo=usuarios.idUsuario;';
		$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10, 10,utf8_decode( $row['idPrestamo']), 1, 0, 'C', 0);
	$pdf->Cell(60, 10,utf8_decode($row['titulo']), 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row['carnet'], 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row['fechaPrestamo'], 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row['fechaEntrega'], 1, 0, 'C', 0);
	$pdf->Cell(18, 10, $row['cantidad'], 1, 0, 'C', 0);
	$pdf->Cell(15, 10, $row['estadoPrestamo'], 1, 1, 'C', 0);

}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,8,'NOTA: Estado?',0,1, 'R');
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,5,'0: Pendiente',0,1,'R');
$pdf->Cell(190,5,'1: Finalizado',0,1,'R');

$pdf->Output();
?>
