<?php
include('../../conf/config.php');
$nama= $_GET['nama'];
$nim= $_GET['nim'];
$fak= $_GET['fakultas'];
$ket= $_GET['keterangan'];
$query = mysqli_query($koneksi,"INSERT INTO tb_mahasiswa (id,nama,nim,fakultas,keterangan) VALUES ('','$nama','$nim','$fak','$ket')");
header('Location:../index.php?page=data-mahasiswa');
?>