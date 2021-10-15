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
<body style="background-color: #fff500">
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
      <a href="<?php echo base_url('notif')?>" class="nav-link text-dark">
                <i class="fa fa-bell mr-3 text-warning fa-fw"></i>
                Pemberitahuan
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('home')?>" class="nav-link text-dark">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                Beranda
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('bbcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-archive mr-3 text-primary fa-fw"></i>
                Bahan Baku
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('ppcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Stok Bahan Baku
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('pbbcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-shopping-cart mr-3 text-primary fa-fw"></i>
                Pesan Bahan Baku
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('pjlcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-money mr-3 text-primary fa-fw"></i>
                Penjualan
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('pccontroller')?>" class="nav-link text-dark">
                <i class="fa fa-birthday-cake mr-3 text-primary fa-fw"></i>
                Produk Cake
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('plgcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-user-o mr-3 text-primary fa-fw"></i>
                Pelanggan
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('suppcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                Supplier
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('lprcontroller')?>" class="nav-link text-dark">
                <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                Laporan
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

        <!-- Card  -->
        <div class="card mb-3">
          <div class="card-header">

            <a href="<?php echo site_url('bbcontroller') ?>"><i class="fa fa-arrow-left"></i>
              Kembali</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data">
            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
              oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

              
              <input type="hidden" name="kode" value="<?php echo $product->kode?>" />

              <div class="form-group">
                <label for="nama">Nama*</label>
                <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                 type="text" name="nama" placeholder="Nama Bahan" value="<?php echo $product->nama ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="stok">Jumlah</label>
                <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
                 type="text" name="stok" min="0" placeholder="stok barang" value="<?php echo $product->stok ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('stok') ?>
                </div>
              </div>

               <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal" min="0" value="<?php echo $product->tanggal ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal') ?>
                </div>
              </div>



              

              <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </form>

          </div>
  <!-- Demo content -->
 
  

</div>

<script src="<?php echo base_url('https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo')?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js')?>" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js')?>" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?php echo base_url('js/main.js')?>"></script>
</body>
</html>