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