<?php
	function facHead($f)
    {
    	global $GRAL_DATA,$SALUD_BD;
    	$Q=utf8_decode(file_get_contents('../inc/query/head_fac'));
    	$DATA=ConsultaSQL($Q.$f,$SALUD_BD);

    	$GRAL_DATA['DATA_FAC']=$DATA[0];

    	$Q=($DATA[0]['TIPO_HIS']==2) ? utf8_decode(file_get_contents('../inc/query/pte_data_u')) : utf8_decode(file_get_contents('../inc/query/pte_data_h'));
    	$DATA=ConsultaSQL($Q.$GRAL_DATA['DATA_FAC']['NRO_HIS'],$SALUD_BD);

    	$GRAL_DATA['DATA_PAC']=$DATA[0];
    }

?>