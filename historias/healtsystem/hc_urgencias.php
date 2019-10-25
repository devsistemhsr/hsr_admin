<?php
	$Q=utf8_decode(file_get_contents("../../inc/query/ALL_FORMAT"));
    $Q=str_replace('xxxxx', $ADMISION, $Q);
    $Q=str_replace('FORMATO_S', 'HSR', $Q);
    $HCU=ConsultaSQL($Q,$HEALT_BD);
    var_dump($HCU);
    if($HCU['C']>=1)
	{ 	
	    $pdf->hoja();
	    $pdf->header1();
		$H=5.5;
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(63,$H,utf8_decode('Admisión No.: '.str_pad($ADMISION,9,'0',STR_PAD_LEFT)),'LTB',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(63,$H,utf8_decode('HISTORIA CLINICA DE URGENCIAS'),'TB',0,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(0,$H,utf8_decode('Historia Clínica:').substr($PACIENTE['Ident'],2,20),'RTB',1,'R');

		$pdf->ln(3);

		$pdf->SetFont('Arial','B',8);
		$H=3;

		unset($HCU['C']);

	    $pdf->header2();

		$i=0;
		$FH=array();
		foreach ($HCU as $Dato)
		{
			
		}

		$pdf->ln(5);
		//$pdf->Image('../../img/firmas/'.$HCU[0]['IdMedico'].'.jpg',$pdf->GetX(),$pdf->GetY(),30);
		$pdf->ln(15);
		$pdf->Cell(50,4,($HCU[0]['NameMedico']),'T',1);
		$pdf->Cell(50,$H,($HCU[0]['IdMedico']),0,1);
		$pdf->Cell(50,$H,('RM No.: '.$HCU[0]['RegMedico']),0,1);
	}
?>