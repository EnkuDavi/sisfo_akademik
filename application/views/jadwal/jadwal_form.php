<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Tambah Jadwal</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Tambah Jadwal</li>
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
                 <a href="<?php echo site_url('jadwal'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"> Back</i>
                 </a>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <form action="<?php echo site_url('jadwal/add_jadwal') ;?>" method="post">
                      <div class="form-group row">
                        <label for="thn" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                        <div class="col-sm-8">
                          <select name="thn" id="" class="form-control">
                            <option>--PILIH--</option>
                            <?php foreach($tahun as $thn) :?>
                              <option value="<?= $thn->thn_id ;?>"><?= $thn->tahun_ajaran;?></option>
                            <?php endforeach ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="smt" class="col-sm-4 col-form-label">Semester</label>
                        <div class="col-sm-8">
                          <select name="smt" id="" class="form-control">
                            <option>--PILIH--</option>
                            <?php foreach($semester as $smt) :?>
                              <option value="<?= $smt->kd_semester ;?>"><?= $smt->smt ;?></option>
                            <?php endforeach ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hari" class="col-sm-4 col-form-label">Hari</label>
                        <div class="col-sm-8">
                          <select name="hari" id="" class="form-control">
                            <option>--PILIH--</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Juma'at">Jum'at</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pelajaran" class="col-sm-4 col-form-label">Pelajaran</label>
                        <div class="col-sm-8">
                        <div class="input-group">
                          <input type="text" name="pelajaran" id="pelajaran" class="form-control rounded-0">
                          <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                              <i class="fas fa-search"></i>
                            </button>
                          </span>
                        </div>  
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pengajar" class="col-sm-4 col-form-label">Pengajar</label>
                        <div class="col-sm-8">
                          <select name="pengajar" id="pengajar" class="form-control">
                            <?php foreach($guru as $g) :?>
                              <option value="<?= $g->nip ;?>"><?= $g->nama_guru ;?></option>
                            <?php endforeach ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pelajaran" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                          <select name="kelas" id="" class="form-control">
                              <option>--PILIH--</option>
                              <?php foreach($kelas as $kls) :?>
                                <option value="<?= $kls->kode_kelas ;?>"><?= $kls->nama_kelas ;?></option>
                              <?php endforeach ;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pelajaran" class="col-sm-4 col-form-label">Jam</label>
                        <div class="col-sm-8">
                          <input type="time" name="jam" class="form-control">
                        </div>
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

    <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title">Data Pelajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
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
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">Action
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
                            <td class="text-center">
                                <button
                                  class="btn btn-sm btn-info text-white" id="pilihMapel"
                                  data-id="<?= $plj->pelajaran_id ;?>"
                                  data-nama="<?= $plj->kode_pelajaran ;?>"
                                  data-guru="<?= $plj->nama_guru ;?>">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
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
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
