<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('font-awesome-4.7.0/css/font-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style2.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css')?>">
	<link rel="icon" href="<?php echo base_url('images/limonam.jpeg')?>" type="image/icon type">
</head>
<body style="background-color: #ce5ffa">
	<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="<?php echo base_url('images/limonam.jpeg')?>" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">LIMONAM</h4>
        <p class="font-weight-normal text-muted mb-0">Dangai Khas Batubara</p>
      </div>
    </div>
  </div>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="<?php echo base_url('notif_gudang')?>" class="nav-link text-dark">
                <i class="fa fa-bell mr-3 text-warning fa-fw"></i>
                Pemberitahuan
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('as_gudang_1')?>" class="nav-link text-dark">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Stok Bahan Baku
            </a>
    </li>
    
    <li class="nav-item">
      <a href="<?php echo base_url('as_gudang_2')?>" class="nav-link text-dark">
                <i class="fa fa-birthday-cake mr-3 text-primary fa-fw"></i>
                Produk Cake
            </a>
    </li>
    
   
    <li class="nav-item">
      <a href="<?php echo base_url('home/logout')?>" class="nav-link text-dark">
                <i class="fa fa-sign-out mr-3 text-danger fa-fw"></i>
                Keluar
            </a>
    </li>
  </ul>
  
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('as_gudang_1') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('as_gudang_1/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="kode">Kode*</label>
                <input class="form-control <?php echo form_error('kode') ? 'is-invalid':'' ?>"
                 type="text" name="kode" placeholder="Kode Bahan" />
                <div class="invalid-feedback">
                  <?php echo form_error('kode') ?>
                </div>
              </div>

              <div class="form-group">
            <label for="nama_bahan" class="col-sm-3">Bahan Baku</label>
            <input class="form-control <?php echo form_error('nama_bahan') ? 'is-invalid':'' ?>"
                 type="text" name="nama_bahan" placeholder="Nama Bahan" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_bahan') ?>
                </div>
          </div>


              <div class="form-group">
                <label for="tanggal_produksi">Tanggal Produksi*</label>
                <input class="form-control <?php echo form_error('tanggal_produksi') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_produksi" placeholder="Tanggal Produksi" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_produksi') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai*</label>
                <input class="form-control <?php echo form_error('tanggal_selesai') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_selesai" placeholder="Tanggal Selesai Produksi" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_selesai') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="hasil">Hasil*</label>
                <input class="form-control <?php echo form_error('hasil') ? 'is-invalid':'' ?>"
                 type="text" name="hasil" placeholder="Hasil Produksi" />
                <div class="invalid-feedback">
                  <?php echo form_error('hasil') ?>
                </div>
              </div>

            
            <div class="form-group">
                <label for="stok">Stok*</label>
                <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
                 type="text" name="stok" placeholder="Hasil Produksi" />
                <div class="invalid-feedback">
                  <?php echo form_error('stok') ?>
                </div>
              </div>
              

              <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>

  <!-- Demo content -->
 
  

</div>

<script src="<?php echo base_url('https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo')?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js')?>" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js')?>" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?php echo base_url('js/main.js')?>"></script>
</body>
</html>