
<?php
	/*Conexion SQL_SERVER*/
	include('../inc/cnn_sql.php');

	/*Inclusiones*/
	include('../inc/fpdf/fpdf.php');
	include('../inc/func_grales.php');
	include('../inc/func_hist.php');

	$pdf = new FPDF();
	
	/* Variables */
	$B=0;
    $H=3.5;
    $URL_LOGO='../img/logo.jpg';
    $FACTURA=$_GET['FAC'];
    
    $GRAL_DATA=array();
	facHead($FACTURA);
	
    $datetime1 = new DateTime($GRAL_DATA['DATA_PAC']['NAC_PAC']->format('Y-m-d'));
    $datetime2 = new DateTime($GRAL_DATA['DATA_FAC']['FEC_FAC']->format('Y-m-d'));
    $interval = $datetime1->diff($datetime2);
    $d=$interval->d;
    $m=$interval->m;
    $y=$interval->y;
    if($y<1)
    {
        if($m<1)
        {
            $E_PAC=$d;
            $U_PAC='DIAS';
        }
        else
        {
            $E_PAC=$m;
            $U_PAC='MESES';
        }
    }
    else
    {
        $E_PAC=$y;
        $U_PAC='AÑOS';
    }


    if(isset($_GET['PDF']))
    {
    	foreach ($_GET['PDF'] as $HOJA)
    	{
    		require($HOJA.'.php');
    	}
    }
  
    $pdf->Output();
?>