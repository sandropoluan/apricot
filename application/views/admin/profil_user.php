<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Profil 
			<small>Pengaturan profil</small></h1>
			<ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Profil </li>
           
          </ol>
	</section>

	<section class="content">
		<div class="box box-warning">
		<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

					<div class="form-group">
						<label>Password Sekarang/lama</label>
						<input type="password" class="form-control" id="password-lama">
					</div>

					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" class="form-control" id="password-baru">
					</div>


					<div class="form-group">
						<label>Ulangi Password Baru</label>
						<input type="password" class="form-control" id="konfirmasi-password-baru">
					</div>


					<div class="form-group">
						<div class="btn btn-info" id="ganti-password-user">Ganti Password</div>
					</div>

					</div>
				</div>
		</div>
		</div>
	</section>
</div>