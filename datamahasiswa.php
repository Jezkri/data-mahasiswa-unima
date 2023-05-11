
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data tabel Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data Mahasiswa
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                 
   

                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Fakultas</th>
                    <th>Keterangan</th>
                    <th width='11%'>Hapus/Edit</th>
                  </tr>
                  </thead>
                  <tbody>



                    <?php 


                    $no =0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $mhs['nama'];?></td>
                    <td><?php echo $mhs['nim'];?></td>
                    <td><?php echo $mhs['fakultas'];?></td>
                    <td><?php echo $mhs['keterangan'];?></td>
                      <td>
                      <a href="delete/hapusdata.php?id=<?php echo $mhs['id'];?>" class="btn-sm btn-danger">Hapus</a>


                      <a href="index.php?page=edit-data&& id=<?php echo $mhs['id'];?>" class="btn-sm btn-success">Edit</a>
                    </td>



                  </tr>
                  <?php }?>
                  </tbody>

                
                </table>
              </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Masukan data mahasiswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get"action="add/tambahdata.php">
            <div class="modal-body">
              
                <div class="form-row">
                <div class="col">
                <input type="text" class="from-control" placeholder="Nama" name="nama" required>
                </div>
                  <div class="col">
                  <input type="text" class="from-control" placeholder="NIM"name="nim"required>
                  </div>

                    <div class="col">
                    <select class="custom-select" id="inputGroupSelect01" name= fakultas>
                      <option selected>Pilih Fakultas</option>
                      <option value="Fakultas Teknik">Fakultas Teknik</option>
                      <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Sosial</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Pendidikan</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Keolahragaan</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Bahasa dan Seni</option>

                    </select>
                    </div>

                    <div class="col">
                    <select class="custom-select" id="inputGroupSelect01" name="keterangan">
                      <option selected>Pilih</option>
                      <option value="SANGAT BERPRESTASI">SANGAT BERPRESTASI</option>
                      <option value="BERPRESTASI">BERPRESTASI</option>
                      <option value="CUKUP">CUKUP</option>
                    </select>
                    </div>
                  </div>
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            

             

            </div>
          </div>
          </form>
<!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
 
