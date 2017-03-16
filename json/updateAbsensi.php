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
        $jam_keluar = $_POST['jam_keluar'];
		$foto_keluar = $_POST['foto_keluar'];
		
        $query = "update absen set jam_keluar='$jam_keluar', foto_keluar='$foto_keluar' where tanggal='$tanggal' AND id='$id' AND jam_keluar='empty';"; 
        $result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		echo "Data telah Terupdate";
?>