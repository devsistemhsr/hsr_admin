<?php
	$Q=ConsultaSQL(utf8_decode(file_get_contents('../inc/query/pte_data_h')).$GRAL_DATA['DATA_FAC']['NRO_HIS']);
	if($Q['C']>=1)
	{
		$US=$Q[0];

		$pdf->SetAutoPageBreak(true,10);
    	$pdf->SetMargins(10,10,10);

		$pdf->AddPage('P',array(216,278));

		$pdf->Image($URL_LOGO,10,10,15);
		$pdf->SetFont('Courier','B',11);
	    $pdf->Cell(50,4,'',0,0);
	    $pdf->Cell(0,4,'ESE HOSPITAL DEPARTAMENTAL SA RAFALE DE FUNDACION',0,1);

	    $pdf->SetFont('Courier','',10);
	    $pdf->Cell(55,4,'',0,0);
	    $pdf->Cell(0,4,'CALLE 16 NO 5A 46',0,1);
		
		$pdf->ln();

	    $pdf->Cell(55,4,'',0,0);
		$pdf->SetFont('Courier','B',10);
	    $pdf->Cell(8,4,'NIT:',0,0);
		$pdf->SetFont('Courier','',10);
	    $pdf->Cell(0,4,'891780008 - 7',0,1);
		
		$pdf->ln(3);

		$pdf->Cell(140,4,'',0,0);
		$pdf->SetFont('Courier','B',10);
	    $pdf->Cell(50,4,'ADMISION DE PACIENTES',0,0,'C');
	    $pdf->Cell(0,4,'',0,1);

	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(85,$H,utf8_decode('DATOS DEL PACIENTE'),'',0);
	    $pdf->SetFont('Courier','',9);
	    $INI=explode(" ", $US['INI']);
		$pdf->Cell(0,$H,utf8_decode('FECHA DE INGRESO:'.$INI[0].' HORA DE INGRESO:'.$INI[1]),'',1,'R');

		$pdf->Cell(0,1,utf8_decode(''),'B',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('IDENTIFICACION:'.$US['ID_PAC']),'',0);
	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(30,$H,utf8_decode('ATENCION:'),'',0);
	    $pdf->SetFont('Courier','',9);
		$pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_FAC']['NRO_HIS']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('NOMBRE:'.$US['NAME_PAC']),'',0);
		$T="EDAD:{$E_PAC} {$U_PAC}  Nacido:".$US['NAC_PAC']->format('d/m/Y')." SEXO:".$US['SEX'];
		$pdf->Cell(0,$H,utf8_decode($T),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(0,$H,utf8_decode('Direccion:'.utf8_decode($US['DIR_PAC'])),'R',1);
		
		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('TELEFONO (S):'.$US['TEL_PAC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('CIUDAD:  '.$US['MUN_PAC']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('CELULAR:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('BARRIO:  '.$US['BAR_PAC']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('OCUPACION:     '.$US['OCU_PAC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TIPO CLIENTE:  '.$US['REG_PAC'].' NIVEL '.$US['NIV_PAC']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('LUGAR DE TRABAJO:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('CONVENIO:  '.$GRAL_DATA['DATA_FAC']['CONV']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('REMITIDO DE:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('CONSUMIDO:        0    '.$US['CNT_PAC']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('SERVICIO:     '.$US['SERVICIO']),'',0);
	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(40,$H,utf8_decode('  CASO CLINICO:'),'',0);
	    $pdf->SetFont('Courier','',9);
		$pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_FAC']['NRO_HIS']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(0,$H,utf8_decode('HABITACION:     '.$US['PAC_HAB']),'R',1);
		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(0,$H,utf8_decode('MEDICO'),'R',1);
		$pdf->Cell(0,3,utf8_decode(''),'BLR',1);

		$pdf->ln();

		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(0,$H,utf8_decode('DATOS DEL RESPONSABLE Y/O ACOMPAÑANTE'),'',1);
		
		$pdf->Cell(0,1,utf8_decode(''),'TLR',1);
		$pdf->SetFont('Courier','',9);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('RESPONSABLE: '.$US['NAME_RS']),'',0);
		$pdf->Cell(48,$H,utf8_decode('PARENTESCO: '.$US['PAR_RS']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$US['TEL_RS']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('RESPONSABLE: '.$US['NAME_AC']),'',0);
		$pdf->Cell(48,$H,utf8_decode('PARENTESCO: '.$US['PAR_AC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$US['TEL_AC']),'R',1);

		$pdf->Cell(0,3,utf8_decode(''),'BLR',1);

		
		$pdf->ln(2);
		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(94,$H,utf8_decode('DATOS DE LA ENTIDAD RESPONSABLE'),'',0);
		$pdf->SetFont('Courier','',9);
		$pdf->Cell(94,$H,utf8_decode('AUTORIZACION N°:'.$GRAL_DATA['DATA_PAC']['AUT']),'',1);

		$pdf->Cell(2,$H,utf8_decode(''),'LT',0);
		$pdf->Cell(140,$H,utf8_decode('NOMBRE:'.$GRAL_DATA['DATA_FAC']['NAME_EPS']),'T',0);
		$pdf->Cell(0,$H,utf8_decode('NIT: '.$GRAL_DATA['DATA_FAC']['NIT_EPS']),'TR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,'DIRECCION: '.$GRAL_DATA['DATA_FAC']['DIR_EPS'],'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$GRAL_DATA['DATA_FAC']['TEL_EPS']),'R',1);

		$pdf->Cell(0,1,utf8_decode(''),'BLR',1);

		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(0,$H,utf8_decode('OBSERVACIONES'),'',1);
		$pdf->Cell(0,12,utf8_decode(''),1,1);

		$pdf->ln(2);
		$pdf->SetFont('Courier','',8);
		$H=3.5;

		$pdf->Cell(0,$H,utf8_decode('Con la presente, en beneficio del seguro, autorizo a:'),'',1);
		$pdf->Cell(0,$H,utf8_decode('ESE HOSPITAL DEPARTAMENTAL SAN RAFAEL DE FUNDACION'),'',1);
		$pdf->Cell(0,$H,utf8_decode('entregar directamente a la empresa responsable la información médica necesaria a través de la copia'),'',1);
		$pdf->Cell(0,$H,utf8_decode('de la historia clinica, remisiones, o informes médicos ampliados o segundas opiniones médicas con fines'),'',1);
		$pdf->Cell(0,$H,utf8_decode('de auditoria médica y/o de cuentas.'),'',1);

		$pdf->ln(10);
		$pdf->Cell(80,$H,utf8_decode('Firma de paciente o responsable'),'T',0);
		$pdf->Cell(20,$H,utf8_decode(''),'',0);
		$pdf->Cell(80,$H,utf8_decode('Usuario: ADMIN'),'T',1);
	}

	$Q=ConsultaSQL(utf8_decode(file_get_contents('../inc/query/pte_data_u')).$GRAL_DATA['DATA_FAC']['NRO_HIS']);
	if($Q['C']>=1)
	{
		$US=$Q[0];

		$pdf->SetAutoPageBreak(true,10);
    	$pdf->SetMargins(10,10,10);

		$pdf->AddPage('P',array(216,278));

		$pdf->Image($URL_LOGO,10,10,15);
		$pdf->SetFont('Courier','B',10);
	    $pdf->Cell(50,4,'',0,0);
	    $pdf->Cell(0,4,'ESE HOSPITAL DEPARTAMENTAL SA RAFALE DE FUNDACION',0,1);

	    $pdf->SetFont('Courier','',10);
	    $pdf->Cell(55,4,'',0,0);
	    $pdf->Cell(0,4,'CALLE 16 NO 5A 46',0,1);
		
		$pdf->ln();

	    $pdf->Cell(75,4,'',0,0);
		$pdf->SetFont('Courier','B',10);
	    $pdf->Cell(8,4,'NIT:',0,0);
		$pdf->SetFont('Courier','',10);
	    $pdf->Cell(0,4,'891780008 - 7',0,1);
		
		$pdf->ln(3);

		$pdf->Cell(140,4,'',0,0);
		$pdf->SetFont('Courier','B',10);
	    $pdf->Cell(50,4,'ADMISION DE PACIENTES',0,0,'C');
	    $pdf->Cell(0,4,'',0,1);

	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(85,$H,utf8_decode('DATOS DEL PACIENTE'),'',0);
	    $pdf->SetFont('Courier','',9);
	    $INI=explode(" ", $US['INI']);
		$pdf->Cell(0,$H,utf8_decode('FECHA DE INGRESO:'.$INI[0].' HORA DE INGRESO:'.$INI[1]),'',1,'R');

		$pdf->Cell(0,1,utf8_decode(''),'B',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('IDENTIFICACION:'.$US['ID_PAC']),'',0);
	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(30,$H,utf8_decode('ATENCION:'),'L',0);
	    $pdf->SetFont('Courier','',9);
		$pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_FAC']['NRO_HIS']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('NOMBRE:'.$US['NAME_PAC']),'',0);
		$T="EDAD:{$E_PAC} {$U_PAC}  Nacido:".$US['NAC_PAC']->format('d/m/Y')." SEXO:".$US['SEX'];
		$pdf->Cell(0,$H,utf8_decode($T),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('Direccion:'.utf8_decode($US['DIR_PAC'])),'R',0);
		$pdf->Cell(0,$H,utf8_decode(''),'LR',1);
		
		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('TELEFONO (S):'.$US['TEL_PAC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('CIUDAD:  '.$US['MUN_PAC']),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('CELULAR:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('BARRIO:  '.$US['BAR_PAC']),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('OCUPACION:     '.$US['OCU_PAC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TIPO CLIENTE:  '.$US['REG_PAC'].' NIVEL '.$US['NIV_PAC']),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('LUGAR DE TRABAJO:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('CONVENIO:  '.$GRAL_DATA['DATA_FAC']['CONV']),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('REMITIDO DE:'),'',0);
		$pdf->Cell(0,$H,utf8_decode('CONSUMIDO:        0    '),'LR',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('SERVICIO:    URGENCIAS'),'R',0);
	    $pdf->SetFont('Courier','B',9);
		$pdf->Cell(40,$H,utf8_decode(''),'',0);
	    $pdf->SetFont('Courier','',9);
		$pdf->Cell(0,$H,utf8_decode(''),'R',1);

		$pdf->Cell(98,3,utf8_decode(''),'BLR',0);
		$pdf->Cell(0,3,utf8_decode(''),'BLR',1);

		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(0,$H,utf8_decode('DATOS DEL RESPONSABLE Y/O ACOMPAÑANTE'),'',1);
		
		$pdf->Cell(0,1,utf8_decode(''),'TLR',1);
		$pdf->SetFont('Courier','',9);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('RESPONSABLE: '.$US['NAME_RS']),'',0);
		$pdf->Cell(48,$H,utf8_decode('PARENTESCO: '.$US['PAR_RS']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$US['TEL_RS']),'R',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,utf8_decode('RESPONSABLE: '.$US['NAME_AC']),'',0);
		$pdf->Cell(48,$H,utf8_decode('PARENTESCO: '.$US['PAR_AC']),'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$US['TEL_AC']),'R',1);

		$pdf->Cell(0,3,utf8_decode(''),'BLR',1);

		
		$pdf->ln(2);
		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(94,$H,utf8_decode('DATOS DE LA ENTIDAD RESPONSABLE'),'',0);
		$pdf->SetFont('Courier','',9);
		$pdf->Cell(94,$H,utf8_decode('AUTORIZACION N°:'.$GRAL_DATA['DATA_PAC']['AUT']),'',1);

		$pdf->Cell(2,$H,utf8_decode(''),'LT',0);
		$pdf->Cell(140,$H,utf8_decode('NOMBRE:'.$GRAL_DATA['DATA_FAC']['NAME_EPS']),'T',0);
		$pdf->Cell(0,$H,utf8_decode('NIT: '.$GRAL_DATA['DATA_FAC']['NIT_EPS']),'RT',1);

		$pdf->Cell(2,$H,utf8_decode(''),'L',0);
		$pdf->Cell(96,$H,'DIRECCION: '.$GRAL_DATA['DATA_FAC']['DIR_EPS'],'',0);
		$pdf->Cell(0,$H,utf8_decode('TEL: '.$GRAL_DATA['DATA_FAC']['TEL_EPS']),'R',1);

		$pdf->Cell(0,1,utf8_decode(''),'BLR',1);

		$pdf->ln(3);

		$pdf->Cell(0,3,utf8_decode('ATENDIDO EN CALIDAD DE:'),'TLR',1);
		
		$pdf->Cell(98,3,utf8_decode('CODUCTOR:'),'L',0);
		$pdf->Cell(0,3,utf8_decode('DOCUMENTO:'),'R',1);

		$pdf->Cell(98,3,utf8_decode('DIRECCION CODUCTOR:'),'L',0);
		$pdf->Cell(0,3,utf8_decode('   TELEFONO CONDUCTOR:'),'R',1);

		$pdf->Cell(0,3,utf8_decode('CLASE DE VEHICULO:'),'LR',1);
		$pdf->Cell(0,3,utf8_decode('RESUMEN ACCIDENTE:'),'LR',1);
		$pdf->Cell(0,3,utf8_decode(''),'LR',1);
		$pdf->Cell(0,3,utf8_decode(''),'LR',1);
		$pdf->Cell(0,3,utf8_decode(''),'LR',1);
		$pdf->Cell(0,3,utf8_decode(''),'BLR',1);

		$pdf->SetFont('Courier','B',9);
		$pdf->Cell(0,$H,utf8_decode('OBSERVACIONES'),'',1);
		$pdf->Cell(0,12,utf8_decode(''),1,1);

		$pdf->ln(2);
		$H=3.5;

		$pdf->Cell(0,1,utf8_decode(''),'TRL',1);
		$pdf->Cell(0,$H,utf8_decode('Con la presente, en beneficio del seguro, autorizo a:'),'RL',1);
		$pdf->Cell(0,$H,utf8_decode('ESE HOSPITAL DEPARTAMENTAL SAN RAFAEL DE FUNDACION'),'RL',1);
		$pdf->Cell(0,$H,utf8_decode('entregar directamente a la empresa responsable la información médica necesaria a través de la copia'),'RL',1);
		$pdf->Cell(0,$H,utf8_decode('de la historia clinica, remisiones, o informes médicos ampliados o segundas opiniones médicas con fines'),'RL',1);
		$pdf->Cell(0,$H,utf8_decode('de auditoria médica y/o de cuentas.'),'RL',1);
		$pdf->Cell(0,1,utf8_decode(''),'BRL',1);

		$pdf->ln(10);
		$pdf->Cell(80,$H,utf8_decode('Firma de paciente o responsable'),'T',0);
		$pdf->Cell(20,$H,utf8_decode(''),'',0);
		$pdf->Cell(80,$H,utf8_decode('Usuario: ADMIN'),'T',1);
	}
?>