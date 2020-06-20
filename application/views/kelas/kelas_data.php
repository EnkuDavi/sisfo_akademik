<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelas</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Kelas</li>
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
                        <h3 class="card-title"><strong> Data Kelas </strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('kelas/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Kelas
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" style="width: 2px;">
                                        No
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Kode Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Nama Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Prodi Kelas
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ;?>
                                <?php foreach($kelas as $kls) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $kls->kode_kelas ;?></td>
                                    <td><?php echo $kls->nama_kelas ;?></td>
                                    <td><?php echo $kls->prodi ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="kelas" data-toggle="modal" data-target="#modal-ubahkelas" 
                                          data-id="<?= $kls->kelas_id;?>"
                                          data-kdkelas="<?= $kls->kode_kelas ;?>"
                                          data-namakelas="<?= $kls->nama_kelas ;?>"
                                          data-prodi="<?= $kls->prodi ;?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('kelas/del/' . $kls->kelas_id) ;?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Data ini Akan Dihapus !')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </a>
                                    </td>
                                    <?php $no++ ;?>
                                    <?php endforeach ;?>
                                  </tr>
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

    <div class="modal fade" id="modal-ubahkelas">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('kelas/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">Kode Kelas</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="kode_kelas" id="kodekelas" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="namakelas" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Prodi</label>
                    <input type="text" name="prodi" id="prodi" value="" class="form-control">
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
