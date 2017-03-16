<?php
	$DatabaseServer   = "localhost";
	$DatabaseUser     = "root";
	$DatabasePassword = "";
	$DatabaseName     = "absensi_mic";

	$mysqli = new mysqli($DatabaseServer, $DatabaseUser, $DatabasePassword, $DatabaseName);
	if ($mysqli->connect_errno) 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$id = $_POST['id'];
	$result = $mysqli->query("SELECT * FROM pegawai WHERE id='$id'");
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	$result->close();
	$mysqli->close();
	print(json_encode($rows));
?>