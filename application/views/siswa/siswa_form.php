<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Tambah Siswa</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <hr>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="text-right">
                 <a href="<?php echo site_url('siswa'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"> Back</i>
                 </a>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="<?php echo site_url('siswa/add_siswa') ;?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="nis">NIS*</label>
                            <input type="text" name="nis" class="form-control" required>
                            </div>
                            <div class="form-group col-md-8">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option selected>--PILIH--</option>
                                <?php foreach($kelas as $kls) :?>
                                    <option value="<?= $kls->kode_kelas ;?>"><?= $kls->kode_kelas ;?></option>
                                <?php endforeach ;?>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option selected>--PILIH--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="angkatan">Angkatan</label>
                                <select name="angkatan" class="form-control" required>
                                    <option selected>--PILIH--</option>
                                    <?php foreach($angkatan as $ang) :?>
                                        <option value="<?= $ang->tahun_ajaran ;?>"><?= $ang->tahun_ajaran ;?></option>
                                    <?php endforeach ;?>
                                </select>    
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="gender">Telp</label>
                                    <input type="number" class="form-control" name="telp" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i> </button>
                        <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-undo"> Reset</i></button>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
    </section>
    <br>
    <!-- /.content -->