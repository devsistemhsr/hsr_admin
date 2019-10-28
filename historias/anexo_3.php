<?php
	$pdf->SetAutoPageBreak(true,10);
	$pdf->SetMargins(10,10,10);

	$pdf->AddPage('P');

	$H=4;
	$pdf->SetFont('arial','B',10);

	$pdf->Image($URL_LOGO_1,12,11,12);
	
	$t=ConsultaSQL("select
x.nombre as EPS,
*
from [anexo3r3047] a
inner join [codcupsanexo3r3047] d on a.id=d.codigoanexo3
inner join admin x on a.codadmin=x.codigo
where a.codigoPaciente='".substr($GRAL_DATA['DATA_PAC']['ID_PAC'],3,20)."' and a.historia=".$GRAL_DATA['DATA_FAC']['NRO_HIS'],$SALUD_BD);

	$ANEXO=$t[0];

	$pdf->Cell(0,1,utf8_decode(''),'TRL',1,'C');
	$pdf->Cell(0,$H,utf8_decode('ANEXO TÉCNICO N°3'),'RL',1,'C');
	$pdf->Cell(0,$H,utf8_decode('SOLICITUD DE AUTORIZACION DE SERVICIOS DE SALUD'),'RL',1,'C');
	$pdf->Cell(0,1,utf8_decode(''),'RL',1,'R');
	$pdf->SetFont('ARIAL','',8);
	$T='Número de solicitud: '.$GRAL_DATA['DATA_FAC']['NRO_HIS'];
	$T.='            Fecha:   '.$ANEXO['fecha']->format('d-m-Y').'    Hora: '.$ANEXO['hora'];
	$pdf->Cell(90,$H,utf8_decode(''),'L',0);
	$pdf->Cell(0,$H,utf8_decode($T),'R',1);
	$pdf->Cell(0,1,utf8_decode(''),'RLB',1,'C');
	
	$pdf->ln(2);

	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,1,utf8_decode(''),'TRL',1);
	$pdf->Cell(0,$H,utf8_decode('INFORMACIÓN DEL PRESTADOR (Solicitante)'),'LR',1);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(25,$H,utf8_decode('Nombre:'),'L',0);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(120,$H,utf8_decode('ESE HOSPITAL DEPARTAMENTAL SAN RAFAEL'),'',0);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(15,$H,utf8_decode('NIT:'),'',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,$H,utf8_decode('891780008'),'R',1);

	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(25,$H,utf8_decode('Código:'),'L',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(40,$H,utf8_decode('472880009101'),'',0);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(35,$H,utf8_decode('Direccion del Prestador:'),'',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,$H,utf8_decode('CALLE 16 NO 5A 46'),'R',1);

	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(25,$H,utf8_decode('Teléfono:'),'BL',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(40,$H,utf8_decode('4140124'),'B',0);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(35,$H,utf8_decode('Departamento:'),'B',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(45,$H,utf8_decode('MAGDALENA'),'B',0);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(15,$H,utf8_decode('Ciudad:'),'B',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,$H,utf8_decode('FUNDACION'),'BR',1);

	$pdf->ln(2);

	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,1,utf8_decode(''),'TRL',1);
	$pdf->Cell(0,$H,utf8_decode('ENTIDAD A LA QUE SE LE SOLICITA (Pagador)'),'LR',1);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(15,$H,utf8_decode('Nombre:'),'L',0);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(130,$H,utf8_decode($ANEXO['EPS']),'',0);
	$pdf->SetFont('ARIAL','B',8);
	$pdf->Cell(15,$H,utf8_decode('Nombre:'),'',0);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(0,$H,utf8_decode($ANEXO['codadmin']),'R',1);
	$pdf->Cell(0,1,utf8_decode(''),'BLR',1);
	
	$pdf->ln(5);

	$pdf->Cell(0,$H,utf8_decode('DATOS DEL PACIENTE'),'1',1,'C');

	
	
?>