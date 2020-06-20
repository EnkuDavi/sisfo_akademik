<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Selamat Datang</h4>
              <p>Semangat ngerjain skripsi nya <strong><?php echo ucfirst($this->fungsi->user_login()->username) ;?></strong> <i class="far fa-smile-beam"></i> </p>
              <hr>
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-cogs"></i> Control Panel
              </button>
            </div>          
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ;?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $sis->num_rows() ;?></h3>

                <p>SISWA</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $gr->num_rows() ;?><sup style="font-size: 20px"></sup></h3>

                <p>GURU</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jurusan->num_rows() ;?></h3>

                <p>JURUSAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $user->num_rows() ;?></h3>

                <p>USER</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content text-center">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"> Control Panel</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>SISWA</strong></p>
                    <i class="fas fa-3x fa-user-graduate"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>GURU</strong></p>
                    <i class="fas fa-3x fa-user"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>TAHUN AKADEMIK</strong></p>
                    <i class="fas fa-3x fa-calendar-alt"></i>
                    </a>
                  </div>
                </div><hr>

                <div class="row">
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>INPUT NILAI</strong></p>
                    <i class="fas fa-3x fa-sort-numeric-down"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>CETAK RAPORT</strong></p>
                    <i class="fas fa-3x fa-print"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>INFO SEKOLAH</strong></p>
                    <i class="fas fa-3x fa-bullhorn"></i>
                    </a>
                  </div>
                </div><hr>

                <div class="row">
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>TENTANG SEKOLAH</strong></p>
                    <i class="fas fa-3x fa-info-circle"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>FASILITAS</strong></p>
                    <i class="fas fa-3x fa-laptop"></i>
                    </a>
                  </div>
                  <div class="col-md-4 text-info text-center">
                    <a href="<?php echo base_url() ;?>"><p class="nav-link text-info"><strong>GALERY</strong></p>
                    <i class="fas fa-3x fa-images"></i>
                    </a>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->