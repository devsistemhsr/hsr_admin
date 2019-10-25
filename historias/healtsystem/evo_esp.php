<?php
	$Q=utf8_decode("select NoFolio from HIST_EVENTO_DE_ATENCION h inner join HIST_MOVIMIENTO_ENCA m on h.NoEvento=m.NoEvento where h.NoUrgencia=$ADMISION and m.CodFormato='P99'");
    $ESP=ConsultaSQL($Q,$HEALT_BD);
    if($ESP['C']>=1)
	{ 	

	    $pdf->hoja();
	    $pdf->header1();
		$H=5.5;
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(63,$H,utf8_decode('Admisión No.: '.str_pad($ADMISION,9,'0',STR_PAD_LEFT)),'LTB',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(63,$H,utf8_decode('EVOLUCIONES DE ESPECIALISTAS (URGENCIAS)'),'TB',0,'C');
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
		
/*
		foreach ($ESP as $Dato)
		{
			$DATA[$Dato['NombreArea']][]=array($Dato['Pregunta'],$Dato['Respuesta']);
		}
		unset($DATA['DATOS PERSONALES']);
		unset($DATA['EN CASO DE ACCIDENTE, INTOXICACION O VIOLENCIA']);

		foreach($DATA as $key=>$value)
		{
			$pass=false;
			foreach ($value as $k => $v)
			{
				if(!empty($v[1]) && !is_null($v[1])) { $pass=true; break; }
			}
			if($pass==true)
			{
				$pdf->SetFont('Arial','B',8);
				$pdf->Cell(95,$H,(strtoupper($key)),0,1);
				foreach ($value as $k => $v)
				{
					if(!empty($v[1]) && !is_null($v[1]))
					{		
						$pos = strpos($v[0], '-LIBRE-');
						if($pos===false)
						{
							$pdf->SetFont('Arial','B',8);
							$pdf->Cell(2,$H,'',0,0);
							$pdf->Cell(55,$H,(strtoupper($v[0]).':'),0,0);
							$pdf->SetFont('Arial','',8);
							if(strlen($v[1])<=90)
							{
								$pdf->Cell(0,$H,(strtoupper($v[1])),0,1);
							}
							else
							{
								$pdf->MultiCell(0,$H,(strtoupper($v[1])));
							}
						}
						else
						{
							$pdf->SetFont('Arial','',8);
							if(strlen($v[1])<=90)
							{
								$pdf->Cell(0,$H,(strtoupper($v[1])),0,1);	
							}
							else
							{
								$pdf->MultiCell(0,$H,(strtoupper($v[1])));	
							}
						}
						$pdf->ln(1);
					}
				}
				$pdf->ln(2);
			}
		}

		*/
	}
?>