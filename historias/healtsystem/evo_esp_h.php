<?php
	$Q=utf8_decode("
		declare @U int
set @U={$ADMISION}
select NoFolio from URG_INGRESO_PACIENTE A
inner join HIST_EVENTO_DE_ATENCION B on A.SecuenciaIngreso=B.SecuenciaIngreso
inner join HIST_MOVIMIENTO_ENCA M on B.NoEvento=M.NoEvento
where A.NoUrgencia=@U and B.NoHospitalizacion is not null
		");
	//var_dump($ESP);
    $ESP=ConsultaSQL($Q,$HEALT_BD);
    if($ESP['C']>=1)
	{ 	

	    $pdf->hoja();
	    $pdf->header1();
		$H=5.5;
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(63,$H,utf8_decode('Admisión No.: '.str_pad($ADMISION,9,'0',STR_PAD_LEFT)),'LTB',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(63,$H,utf8_decode('EVOLUCIONES DE ESPECIALISTAS (HOSPITALIZACION)'),'TB',0,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(0,$H,utf8_decode('Historia Clínica:').substr($PACIENTE['Ident'],2,20),'RTB',1,'R');

		$pdf->ln(3);

		$pdf->SetFont('Arial','B',8);
		$H=3;

		//var_dump($ESP);

	    $pdf->header2();

	    $H=3;
		$i=0;
		$DATA=array();
		
		unset($ESP['C']);
		foreach ($ESP as $key => $value)
		{
			$Q=utf8_decode(file_get_contents("../../inc/query/EVO_UR"));
		    $Q=str_replace('xxxxx', $value['NoFolio'], $Q);
		    $EVO=ConsultaSQL($Q,$HEALT_BD);

		    $d=array();

		    foreach ($EVO as $v)
		    {
		    	switch ($v['Pregunta'])
		    	{
		    		case 'FECHA':
		    			$d[0]=$v['Respuesta'];
		    		break;
		    		case 'HORA':
		    			$d[1]=$v['Respuesta'];
		    		break;
		    		case 'DESCRIPCION':
		    			$d[2]=$v['Respuesta'];
		    		break;
		    		case '-LIBRE-':
		    			$d[3]=$v['Respuesta'];
		    		break;
		    	}
		    }

		    $pdf->SetFont('Arial','B',8);
			$pdf->Cell(20,$H,("FECHA"),0,0);
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(0,$H,$d[0],0,1);
			$pdf->ln(0.5);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(20,$H,("HORA"),0,0);
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(0,$H,$d[1],0,1);
			$pdf->ln(0.5);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(48,$H,("DESCRIPCION"),0,1);
			$pdf->SetFont('Arial','',8);
			$pdf->MultiCell(0,$H,$d[2],0,1);
			$pdf->ln(0.5);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(48,$H,("PLAN DE MANEJO"),0,1);
			$pdf->SetFont('Arial','',8);
			$pdf->MultiCell(0,$H,$d[3]);

			$pdf->Image('../../img/firmas/'.$EVO[0]['IdMedico'].'.jpg',$pdf->GetX(),$pdf->GetY(),30);
			$pdf->ln(15);
			$pdf->Cell(50,4,($EVO[0]['NameMedico']),'T',1);
			$pdf->Cell(50,$H,($EVO[0]['IdMedico']),0,1);
			$pdf->Cell(50,$H,('RM No.: '.$EVO[0]['RegMedico']),0,1);

			$pdf->Cell(0,$H,'','B',1);
			$pdf->ln();
		}
	}
?>