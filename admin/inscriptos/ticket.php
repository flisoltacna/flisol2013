<?php
	if (empty($_POST["nombre"]) or empty($_POST["dni"]) or empty($_POST["certificado"])) {
		exit;
	}

	include_once "../../recursos/fpdf/fpdf.php";

	$pdf = new FPDF();
	
	$pdf->SetTopMargin(16);
	$pdf->AddPage();
	
	$pdf->SetFont("Arial", "", 23.5);
	$pdf->SetTextColor(30, 30, 30);
	$pdf->Cell(0, 8, "Ticket Generado", 0, 1, 'C');

	$pdf->Cell(0, 5, '', 0, 1);

	$pdf->SetFont("Arial", "", 17.7);
	$pdf->Cell(0, 10, utf8_decode("Para el Ingreso al Evento tendrá que presentar este ticket"), 0, 1, 'C');

	$pdf->Cell(0, 4, '', 0, 1);

	$pdf->Image("../../recursos/img/ticket/ticket.png", 25.3);

	$pdf->SetFont("Arial", "", 9.8);

	$pdf->SetXY(27, 71);
	$pdf->Cell(0, 0, $_POST["nombre"], 0, 2, 'C');

	$pdf->SetXY(0, 84);
	$pdf->Cell(0, 0, $_POST["dni"], 0, 2, 'C');

	$pdf->SetXY(0, 98);
	$pdf->Cell(0, 0, $_POST["certificado"], 0, 1, 'C');

	$pdf->SetXY(80, 84);
	$pdf->Cell(0, 0, $_POST["numero"], 0, 1, 'C');

	$pdf->Output("Ticket.pdf", 'D');
?>