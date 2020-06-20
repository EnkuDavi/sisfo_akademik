<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Tambah User</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Tambah User </li>
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
                 <a href="<?php echo site_url('user'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"> Back</i>
                 </a>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <form action="<?php echo site_url('user/add_user') ;?>" method="post">
                        <div class="form-group">
                            <label for="kode_user">ID </label>
                            <input type="text" class="form-control" name="id">
                        </div>

                        <div class="form-group">
                            <label for="kode_user">Username </label>
                            <input type="text" class="form-control" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="kode_user">Email </label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                          <label for="smt">Level</label>
                          <select name="level" id="level" class="form-control" required>
                            <option value="">--PILIH--</option>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_user">Password </label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <span class="text-danger"><?= form_error('pass') ;?></span>     

                        <div class="form-group">
                            <label for="kode_user">Confirm Password </label>
                            <input type="password" class="form-control" name="pasconf" required>
                        </div>
                        <span class="text-danger"><?= form_error('pasconf') ;?></span>     

                        <button type="submit" name="simpan" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i> </button>
                        <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-undo"> Reset</i></button>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->