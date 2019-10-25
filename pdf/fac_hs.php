<?php
	set_time_limit(0);
	if($_SERVER['HTTP_HOST']=='localhost:8080')
	{
		$bd = new MySQLi("localhost", "root", "", "hospcbvw_devhsr");
	}
	else
	{
		$bd = new MySQLi("localhost", "hospcbvw_devhsr", "i9fGfnG?7iZU", "hospcbvw_devhsr");
	}
	if (mysqli_connect_errno())
	{ printf("Connect failed: %s\n", mysqli_connect_error()); $MysqlCnn=mysqli_connect_error(); exit(); }
?>
<?php

	include('fpdf/fpdf.php');
	include('func_grales.php');
	class PDF extends FPDF
	{
		public $FAC;
		function Header()
		{
			$B=0;
		    $this->Image('logo.jpg',10,10,10);
		    $this->SetFont('Arial','',12);
		    $this->Cell(0,3.5,'ESE HOSPITAL DEPARTAMENAL SAN RAFAEL',$B,1,'C');
		    $this->SetFont('Arial','',8);
		    $this->Cell(0,3,'ESE HOSPITAL DEPARTAMENAL SAN RAFAEL',$B,1,'C');
		    $this->Cell(0,3,utf8_decode('Dirección: CALLE 16 N. 5A-46 FUNDACION - Teléfono: 4140124'),$B,1,'C');

		    $this->Ln(5);

		    $this->SetFont('Arial','B',8);
		    $this->Cell(26,3,'Fecha de Factura:',$B,0);
		    $this->SetFont('Arial','',8);
		    $this->Cell(35,3,$this->FAC['FAC_FEC'],$B,0);
		    $this->SetFont('Arial','B',11);
		    $this->Cell(35,4,'ORIGINAL',$B,0,'C');
		    $this->SetFont('Arial','B',10);
		    $this->Cell(55,4,'Factura de Venta No.',$B,0,'R');
		    $this->Cell(0,4,$this->FAC['FAC_NUM'],1,1,'C');

		    $w=$this->GetPageWidth()-20;

		    $this->SetFont('Arial','B',8);
		    $this->Cell($w/2,3.5,'DATOS DEL CONVENIO',1,0,'C');
		    $this->Cell($w/2,3.5,'DATOS DEL PACIENTE',1,1,'C');

		    $B=1;
		    $y=21;
		    $w=($w/2)-$y;
		    
		    $PAC_EPS=array();

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Razón Social:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['EPS_NAM']),'R',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Nombre:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['PAC_NAM']),'R',1);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Nit:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w/2.5,3.5,utf8_decode($this->FAC['EPS_NIT']),'',0);
		    $this->SetFont('Arial','',8);
		    $this->Cell(13,3.5,utf8_decode('Contrato:'),'',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell(31.4,3.5,utf8_decode($this->FAC['EPS_CON']),'R',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Documento:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['PAC_DOC']),'R',1);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Dirección:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['EPS_DIR']),'R',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Dirección:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['PAC_DIR']),'R',1);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Teléfono:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['EPS_TEL']),'R',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Teléfono:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['PAC_TEL']),'R',1);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Ciudad:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w,3.5,utf8_decode($this->FAC['EPS_CIT']),'R',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Parentesco:'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w/2.5,3.5,utf8_decode($this->FAC['PAC_PAR']),'',0);
		    $this->SetFont('Arial','',8);
		    $this->Cell(13,3.5,utf8_decode('Estrato:'),'',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell(31.4,3.5,utf8_decode($this->FAC['PAC_EST']),'R',1);

		    $this->SetFont('Arial','',8);
		    $this->Cell(30,3.5,utf8_decode('Condiciones de Pago:'),'LB',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w-9,3.5,utf8_decode("30 Dias"),'RB',0);

		    $this->SetFont('Arial','',8);
		    $this->Cell($y,3.5,utf8_decode('Ingreso:'),'LB',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($w/2.5,3.5,utf8_decode($this->FAC['PAC_ING']),'B',0);
		    $this->SetFont('Arial','',8);
		    $this->Cell(13,3.5,utf8_decode('Egreso:'),'B',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell(31.4,3.5,utf8_decode($this->FAC['PAC_EGR']),'RB',1);

		    $w=(($this->GetPageWidth()-20)) / 9;
		    $y=$w*2;

		    $this->SetFont('Arial','',8);
		    $this->Cell($w,3.5,utf8_decode('Elaborada Por:'),'BTL',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($y,3.5,utf8_decode($this->FAC['FAC_ELA']),'BT',0);
		    $this->SetFont('Arial','',8);
		    $this->Cell($w,3.5,utf8_decode('Autorización:'),'BT',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($y,3.5,utf8_decode($this->FAC['FAC_AUT']),'BT',0);
		    $this->SetFont('Arial','',8);
		    $this->Cell($w,3.5,utf8_decode('Poliza No:'),'BT',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell($y,3.5,utf8_decode($this->FAC['FAC_POL']),'BTR',1);

		    $this->ln(2);

		}
	}


	$pdf = new PDF();
	$FACTURA=$_GET['FAC'];
	$RS=$bd->query("
SELECT
  `FechaFactura`      AS `FAC_FEC`,
  `Factura`           AS `FAC_NUM`,
  `EmpresaEPS`        AS `EPS_NAM`,
  `Nit`               AS `EPS_NIT`,
  `Contrato`          AS `EPS_CON`,
  `DireccionEPS`      AS `EPS_DIR`,
  `TelefonoEPS`       AS `EPS_TEL`,
  `CiudadEPS`         AS `EPS_CIT`,
  `Paciente`          AS `PAC_NAM`,
  `DocPaciente`       AS `PAC_DOC`,
  `DireccionPaciente` AS `PAC_DIR`,
  `TelefonoPaciente`  AS `PAC_TEL`,
  `Parentesco`        AS `PAC_PAR`,
  `Estrato`           AS `PAC_EST`,
  `Ingreso`           AS `PAC_ING`,
  `Egreso`            AS `PAC_EGR`,
  `ElaboradoPor`      AS `FAC_ELA`,
  `Autorizacion`      AS `FAC_AUT`,
  `PolizaNo`          AS `FAC_POL`
FROM `fac_healt_system` where Factura='$FACTURA' LIMIT 1");
	$RW=$RS->fetch_assoc();
	$pdf->FAC=$RW;

	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(0,3.5,utf8_decode('-DETALLE DE LO SERVICIOS HOSPITALARIOS-'),'1',1,'C');

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,3.5,utf8_decode('Codigo'),'1',0,'C');
	$pdf->Cell(120,3.5,utf8_decode('Servicio'),'1',0,'C');
	$pdf->Cell(9,3.5,utf8_decode('Cant.'),'1',0,'C');
	$pdf->Cell(19,3.5,utf8_decode('V Unitario'),'1',0,'C');
	$pdf->Cell(22,3.5,utf8_decode('V Total'),'1',1,'C');

	$RS=$bd->query("SELECT Programa AS PRG, CodigoServicio AS COD, Servicio AS DET, Cantidad as CNT, vlrTarifa AS VAL FROM `fac_healt_system` WHERE Factura='$FACTURA' ORDER BY Programa");

	$DET=array();

	while ($RW=$RS->fetch_assoc())
	{
		$DET[$RW['PRG']][]=array($RW['COD'],$RW['DET'],$RW['CNT'],$RW['VAL']);
	}
	$TOT=0;
	foreach ($DET as $key => $value)
	{
		$SUB=0;
		foreach ($value as $v){$SUB+=($v[2]*$v[3]);}
		$TOT+=$SUB;
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,4,utf8_decode(''),'0',0,'C');
		$pdf->Cell(120,4,utf8_decode($key),'0',0);
		$pdf->Cell(9,4,utf8_decode(''),'0',0,'C');
		$pdf->Cell(19,4,utf8_decode(''),'0',0,'R');
		$pdf->Cell(22,4,utf8_decode('$ '.number_format($SUB,0,'','.')),'0',1,'R');
		foreach ($value as $v)
		{
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(20,4,utf8_decode($v[0]),'0',0,'C');
			$pdf->Cell(120,4,utf8_decode($v[1]),'0',0);
			$pdf->Cell(9,4,utf8_decode($v[2]),'0',0,'C');
			$pdf->Cell(19,4,utf8_decode('$ '.number_format($v[3],0,'','.')),'0',0,'R');
			$pdf->Cell(22,4,utf8_decode('$ '.number_format($v[2]*$v[3],0,'','.')),'0',1,'R');
		}
	}

	$pdf->ln();
	
	
	$T=Interlineas('SON: '.numtoletras($TOT),60);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,4,utf8_decode('Copago:'),0,0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(30,4,utf8_decode('$ 0'),0,0);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,4,utf8_decode('Modreación:'),0,0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(30,4,utf8_decode('$ 0'),0,1);

	$pdf->ln();

	$pdf->SetFont('Arial','',9);
	$L=isset($T[0]) ? $T[0] : '';
	$pdf->Cell(140,4,utf8_decode($L),0,0);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,4,utf8_decode('SUBTOTAL:'),0,0,'R');
	$pdf->Cell(25,4,utf8_decode('$ '.number_format($TOT,0,'','.')),0,1,'R');

	$pdf->SetFont('Arial','',9);
	$L=isset($T[1]) ? $T[1] : '';
	$pdf->Cell(140,4,utf8_decode($L),0,0);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,4,utf8_decode('Descuento:'),0,0,'R');
	$pdf->Cell(25,4,utf8_decode('$ '.number_format(0,0,'','.')),0,1,'R');

	$pdf->SetFont('Arial','',9);
	$L=isset($T[2]) ? $T[2] : '';
	$pdf->Cell(140,4,utf8_decode($L),0,0);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,4,utf8_decode('VALOR FACTURA:'),0,0,'R');
	$pdf->Cell(25,4,utf8_decode('$ '.number_format($TOT,0,'','.')),1,1,'R');

	$pdf->Image('firma.jpg',30,$pdf->GetY()-3,10);

	$pdf->ln(10);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(50,4,utf8_decode('Autorizado Por'),'T',0,'C');
	$pdf->Cell(5,4,utf8_decode(''),0,0,'C');
	$pdf->Cell(50,4,utf8_decode('Firma Paciente'),'T',1,'C');
	$pdf->Cell(0,4,utf8_decode('ESTA FACTURA SE ASIMILA EN TODOS SUS EFECTOS A LA LETRA DE CAMBIO (COD. DE COMERCIO ART 774)'),0,0,'C');

	$pdf->Output();

?>