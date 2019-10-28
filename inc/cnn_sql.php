<?php

	$TYPE_SERVER='HSR';

    if($TYPE_SERVER=='HSR')
    {
    	/*Conexion SQL HSR*/
    	$serverName = "192.168.1.84,1500";
    	$connectionInfo = array( "Database"=>"HSR_OLD", "UID"=>"SA", "PWD"=>"Infotec123");
    	$HEALT_BD = sqlsrv_connect( $serverName, $connectionInfo);
    	if( !$HEALT_BD ) {
    	    die( print_r( sqlsrv_errors(), true));
    	}

        $serverName = "192.168.1.84,1500";
        $connectionInfo = array( "Database"=>"INFOTEC", "UID"=>"SA", "PWD"=>"Infotec123");
        $SALUD_BD = sqlsrv_connect( $serverName, $connectionInfo);
        if( !$SALUD_BD ) {
            die( print_r( sqlsrv_errors(), true));
        }
	}
	else
	{
    	/*Conexion SQL HOM3*/
    	$serverName = "DESKTOP-OO2DVB2\SQLEXPRESS";
   	 	$connectionInfo = array( "Database"=>"BASE100", "UID"=>"sa", "PWD"=>"41425676.");
    	$HEALT_BD = sqlsrv_connect( $serverName, $connectionInfo);
    	if( !$HEALT_BD ) {
        	die( print_r( sqlsrv_errors(), true));
    	}

        $serverName = "DESKTOP-OO2DVB2\SQLEXPRESS";
        $connectionInfo = array( "Database"=>"Sinsa", "UID"=>"sa", "PWD"=>"41425676.");
        $SINSA_BD = sqlsrv_connect( $serverName, $connectionInfo);
        if( !$SINSA_BD ) {
            die( print_r( sqlsrv_errors(), true));
        }

        $serverName = "DESKTOP-OO2DVB2\SQLEXPRESS";
        $connectionInfo = array( "Database"=>"INFOTEC", "UID"=>"sa", "PWD"=>"41425676.");
        $SALUD_BD = sqlsrv_connect( $serverName, $connectionInfo);
        if( !$SALUD_BD ) {
            die( print_r( sqlsrv_errors(), true));
        }
	}
?>