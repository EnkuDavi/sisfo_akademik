<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PPDB</h1><br>    
            <h5>Penerimaan peserta didik baru</h5> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">PPDB</li>
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
                        <h3 class="card-title"><strong> Data PPDB TA <?= date('Y') ;?></strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('PPDB/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Pendaftar
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
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 357.014px;" aria-sort="descending">Nama Pendaftar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Gender
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Kota Asal
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Sekolah Asal
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">NISN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">No. Telephone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 457.236px;">Nilai Rata2 UN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 357.236px;">Status Pendaftar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 457.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ;?>
                                <?php foreach($row as $pendaftar) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $pendaftar->nama_peserta ;?></td>
                                    <td><?php echo $pendaftar->gender ;?></td>
                                    <td><?php echo $pendaftar->kabupaten ;?></td>
                                    <td><?php echo $pendaftar->asal_sekolah ;?></td>
                                    <td><?php echo $pendaftar->nisn ;?></td>
                                    <td><?php echo $pendaftar->telephon ;?></td>
                                    <td><?php echo $pendaftar->nilai_un ;?></td>
                                    <td><?php echo $pendaftar->status ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="PPDB" data-toggle="modal" data-target="#modal-ubahPPDB" 
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url() ;?>">
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

    <div class="modal fade" id="modal-ubahPPDB">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit PPDB</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('PPDB/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">Kode PPDB</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="kode_PPDB" id="kodePPDB" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama PPDB</label>
                    <input type="text" name="nama_PPDB" id="namaPPDB" class="form-control">
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
