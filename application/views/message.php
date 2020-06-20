<?php if($this->session->has_userdata('Error')) :?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('Error') ;?>
    </div>
<?php endif;?>

<?php if($this->session->has_userdata('success')) :?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> <?php echo $this->session->flashdata('success') ;?></h5>
    </div>
<?php endif;?>