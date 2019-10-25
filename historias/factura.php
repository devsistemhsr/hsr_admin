<?php
	$pdf->SetAutoPageBreak(true,10);
	$pdf->SetMargins(10,10,10);

	$pdf->AddPage('P',array(216,278));

	$pdf->Image($URL_LOGO,10,10,18);

	$pdf->SetFont('Courier','B',11);
	$pdf->Cell(45,4,'',0,0);
	$pdf->Cell(0,4,'ESE HOSPITAL DEPARTAMENTAL SA RAFALE DE FUNDACION',0,1);
	$pdf->SetFont('Courier','',11);
	$pdf->Cell(45,4,'',0,0);
	$pdf->Cell(100,4,'NIT: 891780008-7',0,0);
	$pdf->SetFont('Courier','B',11);
	$pdf->Cell(0,4,'FACTURA DE VENTA','LRT',1);

	$pdf->SetFont('Courier','',11);
	$pdf->Cell(45,4,'',0,0);
	$pdf->Cell(100,4,'CALLE 16 NO 5A 46 FUNDACION 4140124',0,0);
	$pdf->SetFont('Courier','B',11);
	$pdf->Cell(0,4,utf8_decode("Número: SR $FACTURA"),'LR',1);

	$pdf->SetFont('Courier','',11);
	$pdf->Cell(45,4,'',0,0);
	$pdf->Cell(100,4,utf8_decode('HABILITACIÓN: 472880009101'),0,0);
	$pdf->SetFont('Courier','B',11);
	$pdf->Cell(0,4,"Fecha: ".$GRAL_DATA['DATA_FAC']['FEC_FAC']->format('d/m/Y'),'LBR',1);

	$pdf->SetFont('Courier','',10);
	$pdf->Cell(45,4,'',0,0);
	$pdf->Cell(0,4,utf8_decode('ENTIDAD VIGILADA POR LA SUPERINTENDENCIA NACIONAL DE SALUD'),0,1);

	$pdf->ln();


	//Encabezado de Factura

	$pdf->SetFont('Courier','',9);

	$H=2;
	$pdf->Cell(150,$H,utf8_decode(''),'LTR',0);
	$pdf->Cell(0,$H,utf8_decode(''),'LTR',1);

	$H=3;
	$pdf->Cell(150,$H,'','LR',0);
	$pdf->Cell(0,$H,utf8_decode('Fecha:'.$GRAL_DATA['DATA_FAC']['FEC_FAC']->format('d/m/Y')),'LR',1,'C');

	$pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(95,$H,utf8_decode('Cliente'),'',0);
	$pdf->Cell(15,$H,utf8_decode('NIT/CC:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(35,$H,utf8_decode($GRAL_DATA['DATA_FAC']['NIT_EPS']),'R',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=2;
	$pdf->Cell(150,$H,utf8_decode(''),'LR',0);
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=3;
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(145,$H,utf8_decode($GRAL_DATA['DATA_FAC']['NAME_EPS']),'R',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(0,$H,utf8_decode('Vence:'.$GRAL_DATA['DATA_FAC']['VEN_FAC']->format('d/m/Y')),'LR',1,'C');

	$pdf->Cell(95,$H,utf8_decode(''),'L',0);
	$pdf->Cell(24,$H,utf8_decode('Codigo EABP:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(31,$H,utf8_decode($GRAL_DATA['DATA_FAC']['COD_EPS']),'R',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=2;
	$pdf->Cell(150,$H,utf8_decode(''),'LR',0);
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=3;
	$pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(20,$H,utf8_decode('Dirección:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(67,$H,utf8_decode($GRAL_DATA['DATA_FAC']['DIR_EPS']),'',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(18,$H,utf8_decode('Telefono:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(40,$H,utf8_decode($GRAL_DATA['DATA_FAC']['TEL_EPS']),'R',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(0,$H,utf8_decode('Atencion: '.$GRAL_DATA['DATA_FAC']['NRO_HIS'].' '.$GRAL_DATA['DATA_FAC']['ANO_HIS']),'LR',1,'C');

	$H=2;
	$pdf->Cell(150,$H,utf8_decode(''),'LBR',0);
	$pdf->Cell(0,$H,utf8_decode(''),'LBR',1);

	/*--------------------------------------------------*/

	$H=2;
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=3;
	$pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(20,$H,utf8_decode('Paciente:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(65,$H,utf8_decode($GRAL_DATA['DATA_PAC']['NAME_PAC']),'',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(20,$H,utf8_decode('Documento:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(40,$H,utf8_decode($GRAL_DATA['DATA_PAC']['ID_PAC']),'',0);

    $pdf->SetFont('Courier','',9);
	$pdf->Cell(10,$H,utf8_decode('Edad:'),'',0);
	$pdf->SetFont('Courier','B',9);
    $pdf->Cell(0,$H,utf8_decode("$E_PAC $U_PAC"),'R',1);

    $H=2;
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

    $H=3;
	$pdf->SetFont('Courier','',9);
    $pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(20,$H,utf8_decode('Direccion:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(65,$H,utf8_decode($GRAL_DATA['DATA_PAC']['DIR_PAC']),'',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(20,$H,utf8_decode('Telefono:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(40,$H,utf8_decode($GRAL_DATA['DATA_PAC']['TEL_PAC']),'',0);

    $pdf->SetFont('Courier','',9);
	$pdf->Cell(20,$H,utf8_decode('Fecha Nac:'),'',0);
	$pdf->SetFont('Courier','B',9);
    $pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_PAC']['NAC_PAC']->format('d/m/Y')),'R',1);

    $H=2;
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=3;
    $pdf->SetFont('Courier','',9);
    $pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(20,$H,utf8_decode('municipio:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(45,$H,utf8_decode($GRAL_DATA['DATA_PAC']['MUN_PAC']),'',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(15,$H,utf8_decode('Medico:'),'',0);
	$pdf->SetFont('Courier','B',9);
	$pdf->Cell(65,$H,utf8_decode($GRAL_DATA['DATA_PAC']['MEDICO']),'',0);

    $pdf->SetFont('Courier','',9);
	$pdf->Cell(15,$H,utf8_decode('Ambito:'),'',0);
	$pdf->SetFont('Courier','B',9);
    $pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_PAC']['AMBITO']),'R',1);

    $H=2;
	$pdf->Cell(0,$H,utf8_decode(''),'LR',1);

	$H=3;
    $pdf->SetFont('Courier','',9);
    $pdf->Cell(5,$H,utf8_decode(''),'L',0);
	$pdf->Cell(25,$H,utf8_decode('autorizacion:'),'',0);
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(30,$H,utf8_decode($GRAL_DATA['DATA_PAC']['AUT']),'',0);
	$pdf->SetFont('Courier','',9);
	$pdf->Cell(15,$H,utf8_decode('Ingreso:'),'',0);
	$pdf->Cell(37,$H,utf8_decode($GRAL_DATA['DATA_PAC']['INI']),'',0);
	$pdf->Cell(2,$H,utf8_decode(''),'',0);
	$pdf->Cell(13,$H,utf8_decode('Salida:'),'',0);
	$pdf->Cell(33,$H,utf8_decode($GRAL_DATA['DATA_PAC']['FIN']),'',0);

	$pdf->Cell(15,$H,utf8_decode('Regimen:'),'',0);
    $pdf->Cell(0,$H,utf8_decode($GRAL_DATA['DATA_PAC']['REG']),'R',1);

    $H=2;
	$pdf->Cell(0,$H,utf8_decode(''),'LRB',1);

    $H=4;
	$pdf->SetFont('Courier','B',9);

	$pdf->Cell(30,$H,utf8_decode('Codigo'),'LTB',0,'C');
	$pdf->Cell(100,$H,utf8_decode('Descripción'),'TB',0);
	$pdf->Cell(16,$H,utf8_decode('Cnt.'),'TB',0,'R');
	$pdf->Cell(25,$H,utf8_decode('V/Unitario'),'TB',0,'C');
	$pdf->Cell(25,$H,utf8_decode('Total'),'RTB',1,'C');

	$ID=$GRAL_DATA['DATA_FAC']['ID_FAC'];
	$Q="select
		ltrim(rtrim(f.grupo)) as CGR,
		ltrim(rtrim(g.nombre)) as GRP,
		ltrim(rtrim(f.codigo)) as COD,
		ltrim(rtrim(f.nombre)) as DET,
		f.cntdad as CNT,
		f.valor as VUN,
		f.total as VTO
		from factura02 f
		inner join grupos g on f.grupo=g.codigo
		where f.id=$ID
		order by f.grupo";

	$T=ConsultaSQL($Q);
	unset($T['C']);

	$DET=array();

	foreach ($T as $k => $v)
	{
		if(isset($DET[$v['CGR']]))
		{
			$DET[$v['CGR']][]=array(
				"COD" => $v['COD'],
				"DET" => $v['DET'],
				"CNT" => $v['CNT'],
				"VUN" => $v['VUN'],
				"VTO" => $v['VTO']
			);
		}
		else
		{
			$DET[$v['CGR']]['TIT']=$v['GRP'];
			$DET[$v['CGR']][]=array(
				"COD" => $v['COD'],
				"DET" => $v['DET'],
				"CNT" => $v['CNT'],
				"VUN" => $v['VUN'],
				"VTO" => $v['VTO']
			);
		}
		
	}

	//var_dump($DET);
	foreach ($DET as $key => $val)
	{
		$pdf->SetFont('Courier','B',8);
		$pdf->Cell(0,$H,utf8_decode($val['TIT']),'',1);
		for($i=0;$i<count($val)-1;$i++)
		{
			$pdf->SetFont('Courier','',8);
			if(strlen($val[$i]['DET'])>56)
			{
				$DET=Interlineas($val[$i]['DET'],56);

				$pdf->Cell(30,$H,utf8_decode($val[$i]['COD']),'',0,'C');
				$pdf->Cell(100,$H,utf8_decode($DET[0]),'',0);
				$pdf->Cell(16,$H,utf8_decode($val[$i]['CNT']),'',0);
				$pdf->Cell(25,$H,number_format($val[$i]['VUN']),'',0,'C');
				$pdf->Cell(25,$H,number_format($val[$i]['VTO']),'',1,'C');

				$pdf->Cell(30,$H,'');
				$pdf->Cell(100,$H,utf8_decode($DET[1]),'',0);
				$pdf->Cell(0,$H,'','',1);
			}
			else
			{
				$pdf->Cell(30,$H,utf8_decode($val[$i]['COD']),'',0,'C');
				$pdf->Cell(100,$H,utf8_decode($val[$i]['DET']),'',0);
				$pdf->Cell(16,$H,utf8_decode($val[$i]['CNT']),'',0);
				$pdf->Cell(25,$H,number_format($val[$i]['VUN']),'',0,'C');
				$pdf->Cell(25,$H,number_format($val[$i]['VTO']),'',1,'C');
			}
		}
	}

	$pdf->ln();

	$pdf->SetFont('Courier','',9.5);
	$pdf->Cell(0,$H,utf8_decode('Son:'),'',1);

	$H=5;

	$pdf->SetFont('Courier','',8);
	$pdf->Cell(145,$H,utf8_decode(numtoletras($GRAL_DATA['DATA_FAC']['TOT_FAC']).' M/L'),'RLT',0);
	$pdf->Cell(25,$H,utf8_decode('Sub TOTAL:'),'T',0);
	$pdf->Cell(2,$H,utf8_decode('$'),'T',0);
	$pdf->Cell(0,$H,number_format($GRAL_DATA['DATA_FAC']['TOT_FAC']),'RT',1,'R');

	$pdf->Cell(145,$H,utf8_decode(''),'RL',0);
	$pdf->Cell(25,$H,utf8_decode('Coopago/Abono'),'',0);
	$pdf->Cell(2,$H,utf8_decode(''),'',0);
	$pdf->Cell(0,$H,number_format($GRAL_DATA['DATA_FAC']['COP_FAC']),'R',1,'R');

	$pdf->Cell(145,$H,utf8_decode('Favor girar cheque con sello de paguese primer beneficiario a nombre de:'),'RL',0);
	$pdf->Cell(25,$H,utf8_decode('DESCUENTO'),'',0);
	$pdf->Cell(2,$H,utf8_decode(''),'',0);
	$pdf->Cell(0,$H,number_format(0),'R',1,'R');

	$pdf->SetFont('Courier','B',8);
	$pdf->Cell(145,$H,utf8_decode('ESES HOSPITAL DEPARTAMENTAL SAN RAFAEL'),'RL',0);
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(25,$H,utf8_decode('RETENCION'),'',0);
	$pdf->Cell(2,$H,utf8_decode(''),'',0);
	$pdf->Cell(0,$H,number_format(0),'R',1,'R');

	$pdf->Cell(145,$H,utf8_decode(''),'RL',0);
	$pdf->Cell(25,$H,utf8_decode('TOTAL A PAGAR:'),'',0);
	$pdf->Cell(2,$H,utf8_decode('$'),'',0);
	$pdf->Cell(0,$H,number_format($GRAL_DATA['DATA_FAC']['TOT_FAC']-$GRAL_DATA['DATA_FAC']['COP_FAC']),'R',1,'R');

	$pdf->Cell(145,$H,utf8_decode(''),'RL',0);
	$pdf->SetFont('Courier','B',8);
	$pdf->Cell(30,$H,utf8_decode('USUARIO'),'',0,'C');
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(0,$H,utf8_decode('JPAVAS'),'R',1,'C');

	$pdf->SetFont('Courier','',9);
	$pdf->Cell(15,$H,utf8_decode(''),'LB',0);
	$pdf->Cell(60,$H,utf8_decode('FIRMA AUTORIZADA'),'TB',0,'C');
	$pdf->Cell(5,$H,utf8_decode(''),'B',0);
	$pdf->Cell(60,$H,utf8_decode('FIRMA USUARIO'),'TB',0,'C');
	$pdf->Cell(5,$H,utf8_decode(''),'B',0);
	$pdf->Cell(30,$H,utf8_decode(''),'LB',0,'C');
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(0,$H,utf8_decode(''),'RB',1,'C');

	$pdf->MultiCell(0,3.5,utf8_decode("Esta factura cambiaria de compraventa se asimila en sus efectos a una letra de cambio. Art 774. del codigo del comercio. Para los efectos legales del Art 774. del codigo de comercio el comprador y aceptante declara haber recibido los servicios y mercancias detalladas en este titulo valor, obligandose a pagar su valor al prestador del servicio en la forma descrita en esta factura cambiaria,pago que se hará en moneda legal colombiana."),0);
	$pdf->ln(2);
	$pdf->MultiCell(0,3.5,utf8_decode("DE CONFORMIDAD CON EL ART. 6 DE LA RESOLUCION 3878 DE JUNIO 28 DE 1996, LAS ENTIDADES CON CONTRIBUYENTES NO REQUIEREN AUTORIZACION DE LA NUMERACION POR PARTE DE LA DIAN"),0);

	$pdf->ln(1);

	$pdf->SetFont('Courier','b',9.5);
	$pdf->Cell(0,$H,utf8_decode('ORIGINAL'),'',1,'C');
?>