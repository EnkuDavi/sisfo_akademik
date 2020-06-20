<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jadwal Pelajaran</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Jadwal Pelajaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <?php $this->view('message') ;?>
              <div class="row">
                <div class="col-lg-12">
                  <a href="<?php echo site_url('jadwal/add') ;?>">
                  <button class="btn btn-primary"><i class="fas fa-plus"></i> Buat Jadwal Baru</button>
                  </a>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6">
                <form action="<?= site_url('jadwal/tampil') ;?>" method="post">
                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-8">
                      <select name="thn" id="" class="form-control">
                        <option selected>--PILIH--</option>
                        <?php foreach($tahun as $thn) :?>
                          <option value="<?php echo $thn->tahun_ajaran ;?>"><?php echo $thn->tahun_ajaran ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="smt" class="col-sm-4 col-form-label">Semester</label>
                    <div class="col-sm-8">
                      <select name="smt" id="" class="form-control">
                        <option selected>--PILIH--</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <select name="kelas" id="" class="form-control">
                          <option selected>--PILIH--</option>
                          <?php foreach($kelas as $kls) :?>
                            <option value="<?php echo $kls->kode_kelas ;?>"><?php echo $kls->kode_kelas ;?></option>
                          <?php endforeach ;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-12 text-right">
                      <button type="submit" name="submit" class="btn btn-primary">Lihat Jadwal</button>
                    </div>
                  </div>
                </form>   
                </div>
              </div>

            </div>
            
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Jadwal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('Jadwal/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">Kode Jadwal</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="kode_Jadwal" id="kode" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Jadwal</label>
                    <input type="text" name="nama_Jadwal" id="nama" value="" class="form-control">
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
