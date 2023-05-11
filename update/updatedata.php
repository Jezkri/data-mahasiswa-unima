<?php
include('../../conf/config.php');
$id = $_GET['id'];
$nama= $_GET['nama'];
$nim= $_GET['nim'];
$fak= $_GET['fakultas'];
$ket= $_GET['keterangan'];
$query = mysqli_query($koneksi,"UPDATE tb_mahasiswa SET nama='$nama',nim='$nim',fakultas='$fak',keterangan='$ket' WHERE id='$id'");
header('Location:../index.php?page=data-mahasiswa');
?>