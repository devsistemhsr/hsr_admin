<?php
	
	include('../inc/cnn_bd.php');
	include('../inc/func_grales.php');

	if(isset($_GET['jsoncallback']) && !empty($_GET['jsoncallback']))
	{
		$array=array();
		if(isset($_GET['PROC']))
		{
			switch ($_GET['PROC']) {
				case 'LOG':
					$user=sha1($_GET['USER']);
					$pass=sha1($_GET['PASS']);
					$RS=$bd->query("select * from users_hsr where user='$user' and pass='$pass'");
					if($RS->num_rows>=1)
					{
						$array['LOG']='OK';
					}
					else
					{
						$array['LOG']='NO';
					}
				break;
				case 'OUT':
					delGalleta();
				break;
			}
		}
		echo $_GET['jsoncallback'].'('.json_encode($array).')';
	}
?>