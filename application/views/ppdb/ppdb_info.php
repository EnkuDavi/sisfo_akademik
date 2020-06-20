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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

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
            <a class="nav-item nav-link active" style="color:white;font-size:1.2em" href="<?=site_url('home') ;?>">HOME <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link text-right" style="color:white;font-size:1.2em" href="#galeri">TENTANG</a>
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle" style="color:white;font-size:1.2em" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PPDB
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= site_url('ppdb') ;?>">Pengumuman PPDB</a>
                <a class="dropdown-item" href="<?= site_url('ppdb/daftar') ;?>">Pendaftaran</a>
              </div>
            </li>            
            <a class="nav-item nav-link text-right" style="color:white;font-size:1.2em" href="<?php echo base_url('auth');?>">SISTEM</a>
            </div>
        </div>
      </div>
   </nav>

  <!-- Icons Grid -->
  <section class="features-icons text-center" style="background-image: url(assets/dist/img/child.jpg);background-size:cover;height:750px" id="galeri">
    <div class="container p-3" style="border-radius:3%">
        <div class="row">
            <div class="col-sm-6">
            
            </div>
            <div class="col-sm-6 text-white text-left mx-auto">
                <h1>Pengumuman Penerimaan</h1>
                <h1>Peserta Didik Baru</h1> 
                <h1>SMK PGRI 4 Karawang</h1>
                <h2>Tahun Ajaran <?= date('Y') ;?></h2>
                <a href="#tabel" class="btn btn-success"> Lihat Pengumuman</a>
                <br><br>
                <p>Belum mendaftar ? <a href="<?= site_url('ppdb/daftar') ;?>" class="text-warning"><b> Daftar disini </b></a></p>
            </div>
        </div>
    </div>
  </section>

  <main id="tabel">
    <div style="padding:70px;padding-left:100px;padding-right:100px">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center"> Daftar Calon Peserta Didik Baru</h4>
            <br>
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead class="bg-success">
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" style="width: 2px;">
                            No
                        </th>
                        <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 357.014px;" aria-sort="descending">Nama Pendaftar
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">Gender
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Kota Asal
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Sekolah Asal
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 157.236px;">NISN
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Status Pendaftar
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1 ;?>
                    <?php foreach($row as $pendaftar) :?>
                        <tr>
                        <td><?php echo $no ;?></td>
                        <td><?php echo $pendaftar->nama_peserta ;?></td>
                        <td class="text-center"><?php echo $pendaftar->gender ;?></td>
                        <td><?php echo $pendaftar->kabupaten ;?></td>
                        <td><?php echo $pendaftar->asal_sekolah ;?></td>
                        <td><?php echo $pendaftar->nisn ;?></td>
                        <td><?php echo $pendaftar->status ;?></td>
                        <?php $no++ ;?>
                        <?php endforeach ;?>
                        </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
  </main>

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
  <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  
</script>
</body>

</html>
