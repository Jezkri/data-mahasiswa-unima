<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">

<div class="card card-blue">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method='get' action='update/updatedata.php'>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name='nama' value="<?php echo $view['nama'];?>">
                        <input type="text" class="form-control" placeholder="Nama" name='id' value="<?php echo $view['id'];?>"hidden>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" placeholder="NIM" name='nim' value="<?php echo $view['nim'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Fakultas</label>
                        <select class="custom-select" id="inputGroupSelect01" name= fakultas>
                      <option value ="<?php echo $view['fakultas'];?>" selected> <?php echo $view['fakultas'];?></option>
                      <option value="Fakultas Teknik">Fakultas Teknik</option>
                      <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Sosial</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Pendidikan</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Keolahragaan</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                      <option value="Fakultas Ilmu Sosial">Fakultas Bahasa dan Seni</option>

                    </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <select class="custom-select" id="inputGroupSelect01" name="keterangan">
                      <option value ="<?php echo $view['keterangan'];?>" selected> <?php echo $view['keterangan'];?></option>
                      <option value="SANGAT BERPRESTASI">SANGAT BERPRESTASI</option>
                      <option value="BERPRESTASI">BERPRESTASI</option>
                      <option value="CUKUP">CUKUP</option>
                    </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                 
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </section>