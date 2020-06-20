<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">user</li>
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
                        <h3 class="card-title"><strong> Data User </strong></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo site_url('user/add') ;?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                        </a>
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
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Username
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Email
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" style="width: 257.014px;" aria-sort="descending">Level
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 257.236px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;?>
                                <?php foreach($user as $usr) :?>
                                  <tr>
                                    <td><?php echo $no ;?></td>
                                    <td><?php echo $usr->username ;?></td>
                                    <td><?php echo $usr->email ;?></td>
                                    <td><?php echo $usr->role ;?></td>
                                    <td>
                                      <a
                                          class="btn btn-sm btn-warning" id="ubahuser" data-toggle="modal" data-target="#modal-ubahuser"
                                          data-id="<?= $usr->user_id ;?>"
                                          data-user="<?= $usr->username ;?>"
                                          data-email="<?=$usr->email ;?>"
                                          data-level="<?=$usr->role ;?>"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('user/del/' . $usr->user_id) ;?>">
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

    <div class="modal fade" id="modal-ubahuser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('user/edit') ;?>" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="text" name="username" id="username" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="smt">Level</label>
                  <select name="level" id="level" class="form-control" required>
                    <option value="">--PILIH--</option>
                    <option value="1">Admin</option>
                    <option value="2">Guru</option>
                    <option value="3">Siswa</option>
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


<script>
  $(document).ready(function(){
    
    $(document).on('click', '#ubahuser', function(){
        var id = $(this).data('id');
        var user = $(this).data('user');
        var email = $(this).data('email');
        var level = $(this).data('level');

        $('#id').val(id);
        $('#username').val(user);
        $('#email').val(email);
        $('#level').val(level);
    });

  })
</script>