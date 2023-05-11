<?php 

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

     
      <!-- /.sidebar-menu -->
    </div>    <!-- /.sidebar -->
  </aside>


    <!-- Main content -->
    
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md">
            <!-- AREA CHART -->
            
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
              'SANGAT BERPRESTASI',
              'BERPRESTASI',
              'CUKUP'
            ],
            datasets: [{
              label: 'My First Dataset',
              data: [<?php 
                $query =$koneksi->query("SELECT keterangan FROM tb_mahasiswa WHERE keterangan='SANGAT BERPRESTASI'");
                $ketSB = $query->num_rows;
                echo $ketSB;
                ?>,
                <?php 
                $query =$koneksi->query("SELECT keterangan FROM tb_mahasiswa WHERE keterangan='BERPRESTASI'");
                $ketB = $query->num_rows;
                echo $ketB;
                ?>,

                <?php 
                $query =$koneksi->query("SELECT keterangan FROM tb_mahasiswa WHERE keterangan='CUKUP'");
                $ketC = $query->num_rows;
                echo $ketC;
                ?>

              ],
              backgroundColor: [
                'rgb(51, 204, 51)',
                'rgb(255, 153, 51)',
                'rgb(255, 51, 0)'
              ],
              hoverOffset: 4
            }]
        };

          const config = {
            type: 'pie',
            data: data,
        };
         const areaChart = new Chart(
      document.getElementById('areaChart'),
      config
      );
</script>


</body>


</html>
