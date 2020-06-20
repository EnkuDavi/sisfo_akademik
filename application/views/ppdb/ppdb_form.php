<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMK PGRI 4 | Home</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url() ?>assets/landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ;?>assets/landing/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ;?>assets/landing/css/landing-page.min.css" rel="stylesheet">
 
</head>

<body>

  <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="<?php echo base_url() ;?>/assets/dist/img/pgri.jpg" style="width:60px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" style="color:white;font-size:1.2em" href="#">HOME <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link text-right" style="color:white;font-size:1.2em" href="#galeri">TENTANG</a>
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle" style="color:white;font-size:1.2em" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PPDB
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= site_url('ppdb') ;?>">Pengumuman PPDB</a>
                <a class="dropdown-item" href="<?= site_url('ppdb/daftar') ;?>">Pendaftaran</a>
              </div>
            </li>            <a class="nav-item nav-link text-right" style="color:white;font-size:1.2em" href="<?php echo base_url('auth');?>">SISTEM</a>
            </div>
        </div>
      </div>
   </nav>

  <!-- Icons Grid -->
  <section class="features-icons text-center" style="background-color:#040861" id="galeri">
    <div class="container bg-white p-3" style="border-radius:3%">
      <?php if($this->db->affected_rows($row) > 0) :?>  
        <div class="row">
            <div class="col-lg-12">
                <h5>FORM PENDAFTARAN SISWA BARU TAHUN AJARAN <?= date("Y") ;?></h5>
                <?php $this->view('message') ;?>
            </div>
        </div>      
        <br>
        <div class="row">
            <div class="col-lg-12 text-left p-5">
              <?php echo form_open_multipart('ppdb/add')  ?>
                 <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="thn" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                      <select name="gender" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
                    <div class="col-sm-8">
                      <input type="number" name="nisn" class="form-control" value="<?= set_value('nisn') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tl" class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                      <input type="text" name="tl" class="form-control" value="<?= set_value('tl') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tgl" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                      <input type="date" name="tgl" class="form-control" value="<?= set_value('tgl') ;?>" required>
                    </div>
                  </div>

                
                  <div class="form-group row">
                    <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                    <div class="col-sm-4">
                      <select name="agama" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-8">
                      <input type="text" name="sekolah_asal" class="form-control" value="<?= set_value('sekolah_asal') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nilai Rata2 UN</label>
                    <div class="col-sm-4">
                      <input type="number" name="un" class="form-control" value="<?= set_value('un') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat Tempat Tinggal</label>
                    <div class="col-sm-8">
                      <textarea name="alamat" id="" cols="30" rows="5" class="form-control" value="<?= set_value('alamat') ;?>" required></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kelurahan/Desa</label>
                    <div class="col-sm-8">
                      <input type="text" name="desa" class="form-control" value="<?= set_value('desa') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                    <div class="col-sm-8">
                      <input type="text" name="kecamatan" class="form-control" value="<?= set_value('kecamatan') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kabupaten</label>
                    <div class="col-sm-8">
                      <input type="text" name="kabupaten" value="<?= set_value('kabupaten') ;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No. Telepon</label>
                    <div class="col-sm-6">
                      <input type="number" name="telepon" class="form-control" value="<?= set_value('telepon') ;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-4">
                      <input type="file" name="image" class="form-control" required>
                      <small class="form-text text-muted">Ukuran file maks 1 Mb</small>
                    </div>
                  </div>

                  <div class="form-group row">
                  <div class="col-sm-4 col-form-label">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1"> Data yg saya masukkan adalah valid</label>
                  </div>
                    <div class="col-sm-8 ml-auto">
                      <button type="submit" class="btn btn-primary" name="simpan">
                        Submit
                      </button>
                      <button class="btn btn-success" name="simpan">
                        Download Form
                      </button> 
                    </div>
                  </div>
                <?php echo form_close();?>
            </div>            
        </div>

        <?php else :?>
          <div class="row">
            <div class="col-sm-12">
              <h4>Mohon maaf , penerimaan peserta didik baru tahun ajaran <?php echo date('Y');?> sudah ditutup</h4>
            </div>
          </div>

        <?php endif;?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ;?>/assets/landing/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ;?>/assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
