<?php
	/*Conexion SQL_SERVER*/
	include('../../inc/cnn_sql.php');

	/*Inclusiones*/
	include('../../inc/fpdf/fpdf.php');
	include('../../inc/func_grales.php');
	include('../../inc/func_hist.php');

    /* Variables */
    $H=3.5;
    $URL_LOGO='../../img/logo.jpg';
    
    $ADMISION=$_GET['ID'];

    /* INI DATOS PACIENTE */
    $Q=utf8_decode(file_get_contents("../../inc/query/DATA_PAC"));
    $Q=str_replace('xxxxx', $ADMISION, $Q);
    $PAC=ConsultaSQL($Q,$HEALT_BD);
    $PACIENTE=$PAC[0];
    $PACIENTE['Edad']=EdadPac($PACIENTE['FNAC'],$PACIENTE['FATEN']);
    /* FIN DATOS PACIENTE */
	
    //Cabeceras y Pies de Pagina
    class PDF extends FPDF
    {
        // Cabecera de página
        function header1()
        {
            // Logo
            $this->Image('../../img/logo.jpg',10,10,12);
            $this->SetFont('Arial','B',12);
            $this->Cell(0,4,utf8_decode('HOSPITAL DEPARTAMENTAL SAN RAFAEL'),0,1,'C');
            $this->SetFont('Arial','',12);
            $this->Cell(0,4,utf8_decode('891780008-7'),0,1,'C');
            $this->SetFont('Arial','',8);
            $this->Cell(0,3,utf8_decode('ENTIDAD VIGILADA POR LA SUPERINTENDENCIA NACIONAL DE SALUD'),0,1,'C');
            $this->Cell(0,3,utf8_decode('CLLE 16 No 5A 46- FUNDACION; Teléfonos Tel.4140124'),0,1,'C');
            $this->ln();
            //$this->Cell(0,3,utf8_decode('Página ').$this->PageNo().' de {nb}',0,1,'R');
        }

        function header2()
        {
            global $PACIENTE;
            $this->Image('../../img/div1.jpg',11,$this->GetY()-2,190);
            $this->SetFont('Arial','',9);
            $this->Cell(95,3,utf8_decode('Paciente: '.$PACIENTE['Nombre']),0,0);
            $this->Cell(0,3,utf8_decode('Documento de Identidad: '.$PACIENTE['Ident']),0,1);

            $this->Cell(63,3,utf8_decode('Sexo: '.$PACIENTE['Sexo']),0,0);
            $this->Cell(63,3,utf8_decode('Nacimiento: '.$PACIENTE['FNAC']->format('d-m-Y')),0,0);
            $this->Cell(63,3,utf8_decode('Edad: '.$PACIENTE['Edad'][0].' '.$PACIENTE['Edad'][1]),0,1);

            $this->Cell(63,3,utf8_decode('Direccion: '.$PACIENTE['Direccion']),0,0);
            $this->Cell(63,3,utf8_decode('Telefono: '.$PACIENTE['Telefono']),0,0);
            $this->Cell(63,3,utf8_decode('Ciudad: '.$PACIENTE['Ciudad']),0,1);

            $this->Cell(95,3,utf8_decode('Acompañante: '.$PACIENTE['Acomp']),0,0);
            $this->Cell(0,3,utf8_decode('Empresa: '.$PACIENTE['EPS']),0,1);
            
            $this->ln();
            $this->Image('../../img/div1.jpg',11,$this->GetY()-3,190);
        }

        function hoja()
        {
            $this->AddPage();
            $this->SetAutoPageBreak(true,10);
            $this->SetMargins(10,10,10);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-10);
            // Arial italic 8
            $this->SetFont('Arial','',8);
            $this->Cell(0,1,'','T',1);
            $this->Cell(100,3,utf8_decode('Fecha/Hora Impresión:').date('d/m/Y h:i A'),0,0);
            $this->Cell(0,3,utf8_decode('Página ').$this->PageNo().' de {nb} ',0,1,'R');
            
        }
    }

    $pdf = new PDF();

    $Q=utf8_decode(file_get_contents("../../inc/query/ALL_FORMAT"));
    $Q=str_replace('xxxxx', $ADMISION, $Q);
    $ALLt=ConsultaSQL($Q,$HEALT_BD);

    unset($ALLt['C']);

    $ALL=array();
    foreach ($ALLt as $key => $value)
    {
        $ORD[$value['OrdenFormato']]=$value['OrdenFormato'];
        $ALL[$value['CodFormato']][]=array(
            $value['Pregunta']=>$value['Respuesta']
        );
        $ALL[$value['CodFormato']]['MED']=$value['Medico'];
        $ALL[$value['CodFormato']]['FORMATO']=$value['NombreFormato'];
    }

    include('admision.php');
    include('epicrisis.php');
    include('hc_urgencias.php');

    $pdf->Output();
?>