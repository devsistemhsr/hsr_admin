<?php
	$Q=utf8_decode(file_get_contents("../../inc/query/ALL_FORMAT"));
    $Q=str_replace('xxxxx', $ADMISION, $Q);
    $Q=str_replace('FORMATO_S', 'EP1', $Q);
    $EPI=ConsultaSQL($Q,$HEALT_BD);
    if($EPI['C']>=1)
	{ 	
	    $pdf->hoja();
	    $pdf->header1();
		$H=5.5;
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(63,$H,utf8_decode('Admisión No.: '.str_pad($ADMISION,9,'0',STR_PAD_LEFT)),'LTB',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(63,$H,utf8_decode('EPICRISIS - URGENCIAS'),'TB',0,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(0,$H,utf8_decode('Historia Clínica:').substr($PACIENTE['Ident'],2,20),'RTB',1,'R');

		$pdf->ln(3);

		$pdf->SetFont('Arial','B',8);
		$H=3;

		unset($EPI['C']);

	    $pdf->header2();

		$i=0;
		$FH=array();
		foreach ($EPI as $Dato)
		{
			if($Dato['CodPregunta']!='EP100')
			{
				if($i>=0 && $i<=4)
				{
					if($i==4)
					{
						$pdf->SetFont('Arial','B',8);
						$pdf->Cell(48,$H,("FECHA Y HORA DE INGRESO: "),0,0);
						$pdf->SetFont('Arial','',8);
						$pdf->Cell(47,$H,$FH[1].' - '.$FH[2],0,0);
						$pdf->SetFont('Arial','B',8);
						$pdf->Cell(48,$H,("FECHA Y HORA DE EGRESO:"),0,0);
						$pdf->SetFont('Arial','',8);
						$pdf->Cell(0,$H,$FH[3].' - '.$Dato['Respuesta'],0,1);
						$pdf->ln(2);
					}
					else
					{
						$FH[$i]=$Dato['Respuesta'];
					}
				}
				else
				{
					if(!empty($Dato['Respuesta']) && !is_null($Dato['Respuesta']))
					{
						$pdf->SetFont('Arial','B',8);
						$pdf->Cell(95,$H,(strtoupper($Dato['Pregunta'])),0,1);
						$pdf->SetFont('Arial','',8);
						$pdf->MultiCell(0,$H,$Dato['Respuesta']);
						$pdf->ln(2);
					}
				}
			}
			$i++;
		}

		$pdf->ln(5);
		$pdf->Image('../../img/firmas/'.$EPI[0]['IdMedico'].'.jpg',$pdf->GetX(),$pdf->GetY(),30);
		$pdf->ln(15);
		$pdf->Cell(50,4,($EPI[0]['NameMedico']),'T',1);
		$pdf->Cell(50,$H,($EPI[0]['IdMedico']),0,1);
		$pdf->Cell(50,$H,('RM No.: '.$EPI[0]['RegMedico']),0,1);
	}
?>