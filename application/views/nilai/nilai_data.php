<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nilai</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Nilai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                  <a href="<?php echo site_url('nilai/add') ;?>">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Input Nilai</button>
                  </a>
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <form action="<?= site_url('nilai/tampil') ;?>" method="post">
                  <div class="form-row col-6">
                    <div class="form-group col-md-3">
                      <label for="nip">Tahun Ajaran</label>
                      <select name="thn" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <?php foreach($tahun as $t) :?>
                          <option value="<?= $t->kd_thn_ajaran ;?>"><?= $t->tahun_ajaran ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="nip">Kategori</label>
                      <select name="kategori" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="UTS">UTS</option>
                        <option value="UAS">UAS</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="nama">Kelas</label>
                      <select name="kelas" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <?php foreach($kelas as $k) :?>
                          <option value="<?= $k->nama_kelas ;?>"><?= $k->nama_kelas ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <br>
                      <button type="submit" name="submit" class="btn btn-primary"> Lihat Nilai</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
              <br>
            <!-- Small boxes (Stat box) -->
            <?php $this->view('message') ;?>
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <h3 class="card-title"><strong> Data Nilai </strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <?php if($this->input->post() != NULL) :?>
                        <form action="<?php echo site_url('nilai/excel');?>" method="post">
                          <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-6">
                              <input type="text" name="thn" class="form-control" value="<?= $_POST['thn'] ;?>" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-6 col-form-label">Kategori</label>
                              <div class="col-sm-6">
                                <input type="text" name="kategori" class="form-control" value="<?= $_POST['kategori'] ;?>" readonly>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Kelas</label>
                            <div class="col-sm-6">
                              <input type="text" name="kelas" class="form-control" value="<?= $_POST['kelas'] ;?>" readonly>
                            </div>
                          </div>
                          <div class="text-right">
                              <button type="submit" name="export" class="btn btn-success ml-auto">
                                <i class="fas fa-download"></i> Export Excel
                              </button>
                          </div>
                        </form>
                      <?php endif ;?>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" style="width: 2px;">
                                        No
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">NISN
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Nama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Pelajaran
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">KKM
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">Nilai
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php if(isset($_POST['submit'])) :?>
                                <?php $no=1 ;?>
                                <?php foreach($nilai->result() as $n) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $n->nis ;?></td>
                                    <td><?php echo $n->nama ;?></td>
                                    <td><?php echo $n->nama_pelajaran ;?></td>
                                    <td><?php echo $n->kkm ;?></td>
                                    <td><?php echo $n->nilai_angka ;?></td>
                                    <td>
                                      <a
                                        class="btn btn-sm btn-warning" id="ubahNilai" data-toggle="modal" data-target="#modal-ubahNilai" 
                                        data-id="<?= $n->nilai_id;?>"
                                        data-nis="<?= $n->nis ;?>"
                                        data-nama="<?= $n->nama ;?>"
                                        data-pelajaran="<?= $n->nama_pelajaran ;?>"
                                        data-nilai="<?= $n->nilai_angka ;?>">                                
                                          <i class="fas fa-edit"></i> Edit
                                      </a>
                                      <a href="<?php echo site_url('nilai/del/' . $n->nilai_id) ;?>">
                                          <button class="btn btn-sm btn-danger" onclick="return confirm('Data ini Akan Dihapus !')">
                                              <i class="fas fa-trash-alt"></i> Hapus
                                          </button>
                                      </a>
                                    </td>
                                    <?php $no++ ;?>
                                    <?php endforeach ;?>
                                  </tr>
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

    <div class="modal fade" id="modal-ubahNilai">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Nilai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('nilai/edit') ;?>" method="post">
              <div class="form-group">
                    <label for="">NISN</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="nis" id="nis" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" name="nama" id="nama" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <select name="pelajaran" id="pelajaran" class="form-control">
                      <?php foreach($pelajaran as $p) :?>
                        <option value="<?= $p->pelajaran_id ;?>"><?= $p->nama_pelajaran ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nilai</label>
                    <input type="text" name="nilai" id="nilai" value="" class="form-control" required>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<script>
  $(document).ready(function() {
    $(document).on('click','#ubahNilai', function() {
      var id = $(this).data('id');
      var nis = $(this).data('nis');
      var nama = $(this).data('nama');
      var mapel = $(this).data('pelajaran');
      var nilai = $(this).data('nilai');
      $('#id').val(id);
      $('#nis').val(nis);
      $('#nama').val(nama);
      $('#pelajaran').val(mapel);
      $('#nilai').val(nilai);
    });
  });
</script>