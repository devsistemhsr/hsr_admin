<?php 
    $Q=utf8_decode(file_get_contents("../../inc/query/URG_HOJA_ADMISION"));
    $Q=str_replace('xxxxx', $ADMISION, $Q);
    $ADMIN=ConsultaSQL($Q,$HEALT_BD);

    //var_dump($ADMIN);
    unset($ADMIN['C']);

    //Hoja de Admision de Urgencias

    $pdf->hoja();
    $pdf->Image($URL_LOGO,10,10,12);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,$H,utf8_decode('HOSPITAL DEPARTAMENTAL SAN RAFAEL'),0,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode('891780008-7'),0,1,'C');
    $pdf->Cell(0,$H,utf8_decode('HOJA DE ADMISION PARA URGENCIAS'),0,1,'C');

    $pdf->ln(6);

    $H=4;
	$B=0;
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Convenio o EPS'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Empresa']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Tarifa'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Tarifa']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Paciente'),$B,0);  
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Paciente']),$B,0);  

    $pdf->Cell(28,$H,utf8_decode('Doc No'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Tarifa']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Parentesco:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Parentesco']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Estrato'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Estrato']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Semn Cotizadas:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['SemanasCotizadas']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Sexo'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Sexo']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Direccion:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Direccion']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Telefono'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Telefono']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Municipio:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['MunicipioPx']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Edad'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $EDAD=EdadPac($ADMIN[0]['FechaNacimiento'],$ADMIN[0]['FechaRealizado']);
    $pdf->Cell(70,$H,utf8_decode($EDAD[0].' '.$EDAD[1]),$B,1);
    
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,$H,utf8_decode('DOCUMENTOS DE AUTORIZACION'),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Autorización No:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['Autorizacion']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Autorizada Por'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['AutorizadaPor']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Medico Tratante'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['MedicoTratante']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,$H,utf8_decode('Diagnostico de Ingreso'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['DiagnosticoIngreso']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,$H,utf8_decode('PERSONA A CARGO DEL PACIENTE'),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Nombre:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(70,$H,utf8_decode($ADMIN[0]['AcomPaciente']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Doc No'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['AcomDoc']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Direccion'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['AcomDireccion']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Telefono'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['AcomTelefono']),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(126,$H,utf8_decode(''),$B,0);  
    $pdf->Cell(0,$H,utf8_decode("-ORIGINAL-"),$B,1,'C');

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(28,$H,utf8_decode('Admisión No:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,$H,utf8_decode($ADMIN[0]['NoAdmision']),$B,0);  

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(48,$H,utf8_decode('Fecha/Hora de Admisión:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['FechaHoraLlegada']->format('d/m/Y h:i A')),$B,1);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(38,$H,utf8_decode('Admisión Realizada Por:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,$H,utf8_decode($ADMIN[0]['RealizadoPor']),$B,0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(48,$H,utf8_decode('Fecha/Hora de Realizacion:'),$B,0);  
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,$H,utf8_decode($ADMIN[0]['FechaRealizado']->format('d/m/Y h:i A')),$B,1);
?>