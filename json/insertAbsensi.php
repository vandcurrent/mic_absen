<?php 
        $mysql_host = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$my_database = "absensi_mic";
		$db = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Could not connect: ' . mysql_error()); 
        mysql_select_db($my_database) or die('Could not select database');
		
        $tanggal = $_POST['tanggal']; 
        $hari = $_POST['hari']; 
		$id = $_POST['id']; 
        $jam_masuk = $_POST['jam_masuk'];
		$foto_masuk = $_POST['foto_masuk'];
		
        $query = "insert into absen values (NULL, '$tanggal', '$hari', '$id', '$jam_masuk','empty','$foto_masuk','empty', NULL);"; 
        $result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		echo "Data telah Tersimpan";
?>