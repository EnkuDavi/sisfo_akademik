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
              
            <div class="card">
                <div class="card-header">
                  <div class="row">
                      <div class="col-lg-12">
                          <h4 class="text-center"><strong> Data Jadwal  </strong></h4>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <?php if($this->input->post() != NULL) :?>
                      <form action="<?php echo site_url('jadwal/print_jadwal');?>" method="post" target="_blank">
                        <div class="form-group row">
                          <label for="" class="col-sm-6 col-form-label">kelas</label>
                          <div class="col-sm-6">
                            <input type="text" name="kelas" class="form-control" value="<?= $_POST['kelas'] ;?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Tahun</label>
                            <div class="col-sm-6">
                              <input type="text" name="thn" class="form-control" value="<?= $_POST['thn'] ;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-6 col-form-label">Semester</label>
                          <div class="col-sm-6">
                            <input type="text" name="smt" class="form-control" value="<?= $_POST['smt'] ;?>" readonly>
                          </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="submit" class="btn btn-success ml-auto">
                              <i class="fas fa-print"></i> Generate PDF
                            </button>
                        </div>
                      </form>
                      <?php endif;?>
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
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Hari/Tanggal
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Pelajaran
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Pengajar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Jam
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php if($this->input->post() != NULL) :?>
                                <?php $no=1 ;?>
                                <?php foreach($jadwal->result() as $j) :?>
                                <tr>
                                  <td><?= $no ;?></td>
                                  <td><?= $j->date ;?></td>
                                  <td><?= $j->pelajaran_nama ;?></td>
                                  <td><?= $j->nama_guru ;?></td>
                                  <td><?= $j->nama_kelas ;?></td>
                                  <td><?= $j->jam ;?></td>
                                  <td>
                                        <a
                                            class="btn btn-sm btn-warning" id="ubahGuru" data-toggle="modal" data-target="#modal-ubahsiswa"
                                            >
                                              <i class="fas fa-edit"></i> Edit
                                          </a>
                                          <a href="<?php echo site_url('jadwal/del/' . $j->jadwal_id) ;?>">
                                              <button class="btn btn-sm btn-danger" onclick="return confirm('Data ini Akan Dihapus !')">
                                                  <i class="fas fa-trash-alt"></i> Hapus
                                              </button>
                                          </a>
                                      </td>
                                </tr>
                                <?php $no++ ;?>
                                <?php endforeach ;?>
                              <?php endif ;?>
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
