<?php
function db_conn()
{
	$host = "localhost";
	$database = "absensi_mic";
	$user = "root";
	$password = "";
	$link = mysql_connect($host, $user, $password);
	mysql_select_db($database, $link);
	if(!$link)
	{
		echo "Error".mysql_error();
	}
	return $link;
}
?>