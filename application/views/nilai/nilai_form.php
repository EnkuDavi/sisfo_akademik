<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Input Nilai</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Input Nilai</li>
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
                 <a href="<?php echo site_url('Nilai'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"> Back</i>
                 </a>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-4 mx-auto">
                <form action="<?= site_url('nilai/add_nilai') ;?>" method="post">
                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-8">
                      <select name="thn" id="" class="form-control" required>
                        <option value="">--PILIH--</option>
                        <?php foreach($tahun as $thn) :?>
                          <option value="<?php echo $thn->kd_thn_ajaran ;?>"><?php echo $thn->tahun_ajaran ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Semester</label>
                    <div class="col-sm-8">
                      <select name="semester" id="" class="form-control" required>
                        <option value="">--PILIH--</option>
                        <?php foreach($semester as $s) :?>
                          <option value="<?php echo $s->semester_id ;?>"><?php echo $s->smt ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Jenis Nilai</label>
                    <div class="col-sm-8">
                      <select name="kategori" id="" class="form-control" required>
                        <option value="">--PILIH--</option>
                        <option value="UTS">UTS</option>
                        <option value="UAS">UAS</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <select name="kelas_id" id="kelas_id" class="form-control" required>
                        <option value="">--PILIH--</option>
                        <?php foreach($kls as $k) :?>
                          <option value="<?php echo $k->kelas_id ;?>" data-id="<?php echo $k->kode_kelas ;?>"><?php echo $k->nama_kelas ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Nama Siswa</label>
                    <div class="col-sm-8">
                      <select name="siswa" id="sis" class="form-control siswa" required>

                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-8">
                      <select name="pelajaran" id="" class="form-control" required>
                        <option value="">--PILIH--</option>
                        <?php foreach($plj as $p) :?>
                          <option value="<?php echo $p->pelajaran_id ;?>"><?php echo $p->nama_pelajaran ;?></option>
                        <?php endforeach ;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Nilai Angka</label>
                    <div class="col-sm-8">
                      <input type="number" name="nilai_angka" class="form-control" maxlength="3" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-sm-12 text-right">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>

    <!-- /.container-fluid -->
    </section>
    <br>
    <!-- /.content -->

<script>
  $(document).ready(function(){
    $('#kelas_id').change(function(){
      var kelas_id = $('#kelas_id').val();
      if(kelas_id != '')
      {
        $.ajax({
          url:"<?php echo site_url() ;?>/nilai/get_siswa",
          method:"POST",
          data:{kelas_id:kelas_id},
          success:function(data){
            $('#sis').html(data);
          }
        })
      }
    })
  });
</script>