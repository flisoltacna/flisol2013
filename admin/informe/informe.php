<?php
	if (!isset($_POST["orden"])) exit;

	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');

	$condicion = isset($_POST["ausentes"]) ? "" : "asistencia = 1 ";
	$condicion .= isset($_POST["sin_certificado"]) ? "" : "AND certificado = 1";

	if ($_POST["orden"] == "1") {
		$orden = "id";
	} elseif ($_POST["orden"] == "2") {
		$orden = "dni";
	} else {
		$orden = "apellidos";
	}

	$inscriptos = @query_data("SELECT * FROM inscriptos " . ($condicion ? "WHERE $condicion" : "") . " ORDER BY $orden");

	include_once "../../recursos/fpdf/fpdf.php";

	class PDF extends FPDF
	{
	   	function Header() {
			$this->Image('logo.png', 10, 8, 33);
			$this->SetFont('Arial', 'B', 10);
			$this->SetY(10);
			$this->Cell(0, 18, "Emitido: " . date('d/m/Y', time()), 0, 1, 'R');

	   	}

	   	function Footer() {
			$this->SetY(-20);
			$this->SetFont('Arial', '', 10);
			$this->Cell(0, 10, utf8_decode("- Pág. ") . $this->PageNo() . " -", 0, 0, 'C');
		}
	}

	$pdf = new PDF();
	
	$pdf->SetTopMargin(20);
	$pdf->AddPage();
	
	$pdf->SetFont("Arial", "B", 20);
	$pdf->Cell(0, 8, utf8_decode("Informe económico"), 0, 1, 'C');

	$pdf->Cell(0, 8, '', 0, 1);
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(10, 8);
	$pdf->Cell(15, 8, utf8_decode("ID"), 1, 0, 'C');
	$pdf->Cell(95, 8, utf8_decode("Apellidos y nombres"), 1, 0, 'C');
	$pdf->Cell(35, 8, utf8_decode("DNI"), 1, 0, 'C');
	$pdf->Cell(0, 8, utf8_decode("Importe (S/.)"), 1, 1, 'C');

	$certificados = 0;

	foreach ($inscriptos as $i => $inscripto) {
		$pdf->SetFont("Arial", "", 10);
		$pdf->Cell(10, 8, $i + 1);
		$pdf->SetFont("Arial", "", 11);
		$pdf->Cell(15, 8, $inscripto['id'], 1, 0, 'C');
		$pdf->Cell(95, 8, utf8_decode($inscripto['apellidos'] .', '. $inscripto['nombres']), 1);
		$pdf->Cell(35, 8, $inscripto['dni'], 1, 0, 'C');
		if ($inscripto['asistencia'] == 1 and $inscripto['certificado'] == 1) {
			$pdf->Cell(0, 8, "20.00", 1, 1, 'R');
			$certificados++;
		} else {
			$pdf->Cell(0, 8, "0.00", 1, 1, 'R');
		}
	}

	$pdf->Cell(0, 6, '', 0, 1);
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(155, 8, "TOTAL", 0, 0, 'R');
	$pdf->Cell(0, 8, ($certificados*20) .".00", 1, 1, 'R');

	$pdf->Output("Informe.pdf", 'D');
?>