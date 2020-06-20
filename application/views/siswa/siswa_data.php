<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Siswa</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Siswa</li>
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
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="card-title"><strong> Data Siswa </strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('siswa/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah siswa
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" style="width: 2px;">
                                        No
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">NIS
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.014px;">Nama siswa
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 117.236px;">Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 67.236px;">Gender
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Alamat
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 207.236px;">Telp
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">Angkatan
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;?>
                                <?php foreach($siswa as $sis) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $sis->nis ;?></td>
                                    <td><?php echo $sis->nama ;?></td>
                                    <td><?php echo $sis->kode_kelas ;?></td>
                                    <td class="text-center"><?php echo $sis->gender ;?></td>
                                    <td><?php echo $sis->alamat ;?></td>
                                    <td><?php echo $sis->telp ;?></td>
                                    <td><?php echo $sis->angkatan ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="ubahSiswa" data-toggle="modal" data-target="#modal-ubahsiswa"
                                          data-id="<?= $sis->siswa_id ;?>"
                                          data-nis="<?= $sis->nis ;?>"
                                          data-nama="<?= $sis->nama ;?>"
                                          data-kls="<?= $sis->kode_kelas ;?>"
                                          data-gender="<?= $sis->gender ;?>"
                                          data-alamat="<?= $sis->alamat ;?>"
                                          data-telp="<?= $sis->telp ;?>"
                                          data-angkatan="<?= $sis->angkatan ;?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('siswa/del/' . $sis->siswa_id) ;?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Data ini Akan Dihapus !')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </a>
                                    </td>
                                  </tr>
                                  <?php $no++ ;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div> 
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-ubahsiswa">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('siswa/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">NIS*</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="nis" id="nis" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama siswa</label>
                    <input type="text" name="nama" id="nama" value="" class="form-control" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-6">
                      <label for="">Kelas</label>
                      <select name="kelas" id="kelas" class="form-control" required>
                          <?php foreach($kelas as $kls) :?>
                              <option value="<?= $kls->kode_kelas ;?>"><?= $kls->kode_kelas ;?></option>
                          <?php endforeach ;?>
                      </select>                </div>
                  <div class="form-group col-sm-6">
                      <label for="">Gender</label>
                      <select name="gender" id="gender" class="form-control" required>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                      </select>                
                  </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Telp</label>
                    <input type="number" class="form-control" id="telp" name="telp" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <select name="angkatan" id="angkatan" class="form-control" required>
                        <?php foreach($angkatan as $ang) :?>
                            <option value="<?= $ang->tahun_ajaran ;?>"><?= $ang->tahun_ajaran ;?></option>
                        <?php endforeach ;?>
                    </select>    
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
