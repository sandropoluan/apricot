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
						<?php 
						if($user_level==1){
							echo "Halaman ini masih sementara dibuat, silahkan edit data user di halaman 'Managemen User'";
						} else {
							echo "Halaman ini masih sementara dibuat, untuk sekarang hanya Super admin yang bisa mengedit data admin";
						}
						echo"<br> Akan hadir di versi selanjutnya";
						?>
					</div>
				</div>
		</div>
		</div>
	</section>
</div>