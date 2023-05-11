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
              </li>

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
            <h1>Bar Fakultas  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Grafik</a></li>
              <li class="breadcrumb-item active">Chart</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- /.content-header -->

    <!-- Main content -->
    
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mahasiswa Tahun 2020 dan 2021</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="width: 150px; height: 50px;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>


          </div>
          <!-- /.col (LEFT) -->
        
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

</div>
<?php
  include ('footer.php'); 
  ?>
</body>
</div>
    <!-- /.content -->
  

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js" integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

          const data = {
            labels: [
              'Fakultas Bahasa dan Seni',
              'Fakultas Teknik',
              'Fakultas Matematika dan Ilmu Pengetahuan Alam',
              'Fakultas Ilmu Keolahragaan',
              'Fakultas Ilmu Sosial',
              'Fakultas Ilmu Pendidikan',
              'Fakultas Ekonomi'
            ],
            datasets: [{
              label: '',
              data: [<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Bahasa dan Seni'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,
                <?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Teknik'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Matematika dan Ilmu Pengetahuan Alam'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Ekonomi'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Ilmu Sosial'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Ilmu Pendidikan'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,<?php 
                $query =$koneksi->query("SELECT fakultas FROM tb_mahasiswa WHERE fakultas='Fakultas Ilmu Keolahragaan'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,

              ],
              backgroundColor: [
                'rgb(255, 0, 255)',
                'rgb(255, 153, 51)',
                'rgb(255, 51, 0)',
                'rgb(102, 102, 255)',
                'rgb(255, 255, 0)',
                'rgb(51, 204, 51)',
                'rgb(204, 0, 0)'
              ],
              hoverOffset: 7
            }]
        };

          const config = {
            type: 'bar',
            data: data,

        };
         const areaChart = new Chart(
      document.getElementById('areaChart'),
      config
      );


</script>


</body>


</html>
