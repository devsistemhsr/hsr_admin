<?php
	$pdf->SetAutoPageBreak(true,10);
	$pdf->SetMargins(10,10,10);

	$pdf->AddPage('P',array(216,278));

	$H=3;
	$pdf->SetFont('Courier','B',8);

	$pdf->Image($URL_LOGO,10.5,10.5,10);
	
	$pdf->Cell(0,2,utf8_decode(''),'TRL',1,'C');
	$pdf->Cell(0,$H,utf8_decode('ESE HOSPITAL DEPARTAMENTAL SAN RAFAEL DE FUNDACION'),'RL',1,'C');
	$pdf->Cell(107,$H,utf8_decode('891780008'),'L',0,'R');
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(0,$H,utf8_decode('Historia No ').substr($GRAL_DATA['DATA_PAC']['ID_PAC'], 2,100),'R',1,'C');
	$pdf->SetFont('Courier','B',8);
	$pdf->Cell(0,$H,utf8_decode('CALLE 16 NO 5A 46'),'RL',1,'C');
	$pdf->Cell(0,$H,utf8_decode('EPICRISIS'),'BRL',1,'C');
	$pdf->Cell(0,$H,utf8_decode('DATOS PERSONALES'),'TBRL',1,'C');
	
	/** ini datos personales **/
	$pdf->SetFont('Courier','',7);
	$pdf->Cell(98,$H,utf8_decode('APELLIDOS:  '.$GRAL_DATA['DATA_PAC']['APES_PAC']),'TL',0);
	$pdf->Cell(0,$H,utf8_decode('NOMBRES:  '.$GRAL_DATA['DATA_PAC']['NOM_PAC']),'TR',1);

	$pdf->Cell(0,1,utf8_decode(''),'LR',1);
	$pdf->Cell(64,$H,utf8_decode("EDAD:{$E_PAC} {$U_PAC}"  ),'',0);
	$pdf->Cell(64,$H,utf8_decode('NOMBRES:  '.$GRAL_DATA['DATA_PAC']['NOM_PAC']),'',0);
	$pdf->Cell(0,$H,utf8_decode('NOMBRES:  '.$GRAL_DATA['DATA_PAC']['NOM_PAC']),'',1);

	/** fin datos personales **/
?>