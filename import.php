<?php 
include ('header.php');
include ('navbar.php');

$koneksi = mysqli_connect("localhost","root","","db_unima");

?>

<html lang="en">
<head>
  <!-- Content Header (Page header) -->
    <div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
<body class="hold-transition sidebar-mini layout-fixed">
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
 <?php include ('logo.php');?> 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">coba | superadmin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Akademik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               </li>
              <li class="nav-item">
                <a href="import.php?page=data-import" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IMPORT Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=data-mahasiswa" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mahasiswa</p>
                </a>  
             
              <li class="nav-item">
                <a href="datagrafik.php?page=data-grafik-chart" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Chart</p>
                </a>
                <li class="nav-item">
                <a href="diagram.php?page=data-diagram" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bar</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-red">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>
      
        </ul>
      </nav>      
      <!-- /.sidebar-menu -->
    </div>    <!-- /.sidebar -->
  </aside>
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Data Mahasiswa</h1>
          </div>
          
      </div><!-- /.container-fluid -->
    </section>
      <!-- /.content-header -->

    <!-- Main content -->
    
     <form action="#" method="POST" enctype="multipart/form-data">
              <input type="file" name="data" >
              <input type="submit" name="input" value="IMPORT" class="btn btn-success">
          </form> 
    </section>


          


     <?php
          
          if(isset($_POST['input'])){


            $datanama = $_FILES['data']['name'];
            $datatmp = $_FILES['data']['tmp_name'];
            // $typeFile     = pathinfo($datanama, PATHINFO_EXTENSION);

            $destination_path = getcwd().DIRECTORY_SEPARATOR;
            $ext = pathinfo($datanama, PATHINFO_EXTENSION);
            $folder = 'file/'.$datanama;


            if($ext =='csv'){
                $upload = move_uploaded_file($datatmp, $folder);
                if($upload){
                  $open = fopen($folder,'r');
                  while(($row = fgetcsv($open, 10000, ','))!==FALSE){
                    // var_dump($row[0]);
                    // var_dump(explode(';', $row[0]));

                    $dataMantah   = explode(';', $row[0]);
                    // var_dump($dataMantah[0], $dataMantah[1], $dataMantah[2]);

                    // $sql = mysql_query("INSERT INTO tb_mahasiswa VALUES ('','".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."')");


                    $data2 = mysqli_query($koneksi,"SELECT nim FROM tb_mahasiswa WHERE nim='".$dataMantah[1]."'");
                    $cek = mysqli_num_rows($data2);

                    // var_dump($cek);


                    if ($cek > 0 ){
                      echo "<font color='red'>Error : Data Sudah di Input</font>"."<br>";
                    } else {
                      $q = mysqli_query ($koneksi,"INSERT INTO tb_mahasiswa (nama,nim,fakultas,keterangan) VALUES ('".$dataMantah[0]."','".$dataMantah[1]."','".$dataMantah[2]."','".$dataMantah[3]."')");
                      
                      if ($q) {
                      echo "<font color='green'>Data Baru Berhasil di Input</font>"."<br>";"";
                    } else {
                      echo "Error: " . $q . "<br>" . mysqli_error($koneksi);
                    }
                    }
                    // $check = mysqli_query($koneksi, "SELECT nim FROM tb_mahasiswa WHERE nim='".$dataMantah[1]."' ");

                    // var_dump($check);
                    // // var_dump(count($check));
                    // ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')

                    
                  }
                   
                    // header ('Location: http://localhost/unima/app'); 
                }
                
                else{
                    echo "gagal diupload";
                }
            }else{
              echo "Bukan file csv";
            }
          }


         // $data2 = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
         // $cek = mysqli_num_rows($data2);


         //    if ($cek == 0 ){
         //      echo "data sudah di input";
         //    } else {

              
         //    }
      ?>
