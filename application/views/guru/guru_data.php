<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Guru</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Guru</li>
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
                        <h3 class="card-title"><strong> Data Guru </strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('guru/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah guru
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
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">NIP
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.014px;">Nama Guru
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 67.236px;">Gender
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 207.236px;">Telp
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;?>
                                <?php foreach($guru as $g) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $g->nip ;?></td>
                                    <td><?php echo $g->nama_guru ;?></td>
                                    <td class="text-center"><?php echo $g->gender ;?></td>
                                    <td><?php echo $g->status ;?></td>
                                    <td><?php echo $g->telp ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="ubahGuru" data-toggle="modal" data-target="#modal-ubahsiswa"
                                          data-id="<?= $g->guru_id ;?>"
                                          data-nip="<?= $g->nip ;?>"
                                          data-nama="<?= $g->nama_guru ;?>"
                                          data-gender="<?= $g->gender ;?>"
                                          data-status="<?= $g->status ;?>"
                                          data-telp="<?= $g->telp ;?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('guru/del/' . $g->guru_id) ;?>">
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
              <h4 class="modal-title">Form Edit Data Guru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('guru/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">NIP*</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="nip" id="nip" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Guru</label>
                    <input type="text" name="nama_guru" id="nama_guru" value="" class="form-control" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option selected>--PILIH--</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" id="telp" name="telp" required>
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
