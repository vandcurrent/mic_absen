<?php 
        $mysql_host = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$my_database = "absensi_mic";
		$db = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Could not connect: ' . mysql_error()); 
        mysql_select_db($my_database) or die('Could not select database');
		
		$id 			= $_POST['id']; 
		//$nama 			= $_POST['nama']; 
		
        $query_select	= mysql_query("select no, jam_keluar from absen where id = '$id' order by no desc limit 1");
		$tpl_select 	= mysql_fetch_assoc($query_select);

		if($tpl_select['jam_keluar'] == "empty")
		{
			echo "KELUAR";
		}
		else
		{
			 echo "MASUK";
		}

		
?>
