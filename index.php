<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if(!$_SESSION['nama']){
  header('Location:../');
}?>
<?php include('header.php');?>
<?php include('../conf/config.php');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
  <?php include ('logo.php');?>

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>
 
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
 <?php include ('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    if (isset($_GET['page'])){
    if ($_GET['page']=='dashboard'){
       include('dashboard.php');
    }
    else if ($_GET['page'] =='data-mahasiswa'){
      include('datamahasiswa.php');
    }

    else if ($_GET['page'] =='edit-data'){
      include('edit/editdata.php');
  }
    else {
      include('notfound.php');
  }
}
else {
      include('dashboard.php');
  }?>

  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php')?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
