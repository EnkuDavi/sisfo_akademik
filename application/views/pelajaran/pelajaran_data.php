<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mata pelajaran</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                        <h3 class="card-title"><strong> Data Mata Pelajaran </strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('pelajaran/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Mata Pelajaran
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
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Kode Pelajaran
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Nama Pelajaran
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Pengajar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;?>
                                <?php foreach($pelajaran as $plj) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $plj->kode_pelajaran ;?></td>
                                    <td><?php echo $plj->nama_pelajaran ;?></td>
                                    <td><?php echo $plj->nama_guru ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="ubahPelajaran" data-toggle="modal" data-target="#modal-ubahPelajaran"
                                          data-id="<?= $plj->pelajaran_id ;?>"
                                          data-kd="<?= $plj->kode_pelajaran ;?>"
                                          data-nama="<?= $plj->nama_pelajaran ;?>"
                                          data-guru="<?= $plj->nama_guru ;?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('pelajaran/del/' . $plj->pelajaran_id) ;?>">
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

    <div class="modal fade" id="modal-ubahPelajaran">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Mata Pelajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('pelajaran/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">Kode mata pelajaran</label>
                    <input type="hidden" id="idplj" name="id" value="">
                    <input type="text" name="kode_pelajaran" id="kodeplj" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama mata pelajaran</label>
                    <input type="text" name="nama_pelajaran" id="namaplj" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="guru">Guru</label>
                    <select name="guru" id="guru" class="form-control">
                      <?php foreach($guru as $g ) :?>
                        <option value="<?= $g->guru_id ;?>"><?= $g->nama_guru ;?></option>
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
