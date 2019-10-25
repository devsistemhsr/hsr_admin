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
		    $this->Image('logo.jpg',20,10,14);
		    $this->SetFont('Arial','',12);
		    $this->Cell(35,4,'',$B,0);
		    $this->Cell(115,5.5,'ESE HOSPITAL DEPARTAMENAL SAN RAFAEL',$B,0);
		    $this->SetFont('Arial','B',9);
		    $this->Cell(0,5.5,'FACTURA DE VENTA',1,1,'C');

		    $this->Cell(35,3.5,'',$B,0);
		    $this->SetFont('Arial','',9);
		    $this->Cell(115,3.5,'NIT 891780008',$B,0);
		    $this->SetFont('Arial','',8);
		    $this->Cell(15,3.5,utf8_decode('Número'),'L',0);
		    $this->SetFont('Arial','B',8);
		    $this->Cell(0,3.5,': '.$this->FAC['FAC_NUM'],'R',1);
		    $this->SetFont('Arial','',8);

		    $this->Cell(35,3,'',$B,0);
		    $this->Cell(115,3,utf8_decode('Habilitación No. 472880009101'),$B,0);
		    $this->Cell(15,3,utf8_decode('Fecha'),'L',0);
		    $this->Cell(0,3,': '.$this->FAC['FAC_FEC'],'R',1);

		    $this->Cell(35,3,'',$B,0);
		    $this->Cell(115,3,utf8_decode('CLLE 16 No 5A 46 - FUNDACION Tel. 4140124'),$B,0);
		    $this->Cell(15,3,utf8_decode('Página'),'L',0);
		    $this->Cell(0,3,': '.$this->PageNo().' de {nb}','R',1);

		    $this->Cell(35,3,'',$B,0);
		    $this->Cell(115,2,utf8_decode('ENTIDAD VIGILADA POR LA SUPERINTENDENCIA NACIONAL DE SALUD'),$B,0);
		    $this->Cell(0,3,'','T',1);

			$this->ln();		    
			$this->Cell(105,3,utf8_decode('Entidad: ').$this->FAC['EPS_NAM'],'',0);
			$this->Cell(50,3,utf8_decode('NIT: '.$this->FAC['EPS_NIT']),'',0);
			$this->Cell(0,3,utf8_decode('Forma Pago : CREDITO'),'',1);

			$this->Cell(105,3,utf8_decode('Entidad: ').$this->FAC['EPS_NAM'],'',0);
			$this->Cell(50,3,utf8_decode('NIT: '.$this->FAC['EPS_NIT']),'',0);
			$this->Cell(0,3,utf8_decode('Forma Pago : CREDITO'),'',1);

		    //$this->Cell(0,3,utf8_decode('Dirección: CALLE 16 N. 5A-46 FUNDACION - Teléfono: 4140124'),$B,1,'C');
		}
	}


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$FACTURA=$_GET['FAC'];
	$RS=$bd->query("select * from fac_head_sinsa where FAC_NUM=$FACTURA");
	$pdf->FAC=$RS->fetch_assoc();
	$pdf->Output();

?>