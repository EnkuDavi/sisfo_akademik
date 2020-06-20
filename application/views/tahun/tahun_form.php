<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Tambah Tahun Akademik</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Tambah Tahun Akademik</li>
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
                 <a href="<?php echo site_url('tahun'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"> Back</i>
                 </a>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <form action="<?php echo site_url('tahun/add_tahun') ;?>" method="post">
                        <div class="form-group">
                            <label for="kode_tahun">Tahun Ajaran</label>
                            <input type="text" class="form-control" name="thn" required>
                        </div>
                        <div class="form-group">
                          <label for="smt">Semester</label>
                          <select name="smt" id="smt" class="form-control" required>
                            <option value="">--PILIH--</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                          </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i> </button>
                        <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-undo"> Reset</i></button>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->