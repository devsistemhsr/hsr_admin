<?php
	
	include('../inc/cnn_bd.php');
	include('../inc/func_grales.php');

	if(isset($_GET['jsoncallback']) && !empty($_GET['jsoncallback']))
	{
		$array=array();
		if(isset($_GET['sFac']))
		{
			$RS=$bd->query("SELECT Factura from fac_healt_system where Factura='".$_GET['sFac']."' LIMIT 1");
			if($RS->num_rows>=1)
			{
				$array['FAC']='OK';
			}
			else
			{
				$array['FAC']='NO';
			}
		}
		echo $_GET['jsoncallback'].'('.json_encode($array).')';
	}
?>