<?php

$host = "localhost";
$user= "root";
$pass= "";
$db= "db_unima";

$connect = mysqli_connect($host,$user,$pass,$db);
if(mysqli_connect_error())
{
	echo "koneksi database gagal";
}
?>