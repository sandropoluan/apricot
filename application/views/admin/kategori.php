<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <div class="content-wrapper" style='min-height: 800px' >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori
            <small>Atur dan tambahkan kategori</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li class="active"> Kategori</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class='box box-warning'>
          		<div class='box-header'> 
          			<div class='well well-sm halus'>Klik <span class='label label-warning'><small><i class='fa fa-plus'></i></small> tambah </span>  untuk menambahkan kategori baru, klik <small><i class='fa fa-plus'></i></small> pada kategori untuk menambahkan sub-kategori
          			</div>
          		</div>
          		<div class='box-body'>

          			<div class='row mart-10'>
	          			<div class='col-md-4'>
	          			<button class='btn btn-warning btn-xs tambah-kat'> <small><i class='fa fa-plus'></i></small> tambah </button>
	          			</div>
          			</div>

          			<div class='row mart-10 row-hide'> 
          				<div class='col-md-3'>
          					<div class="input-group">
						      <input type="text" class="form-control form-kategori" placeholder="Tambah kategori">
						       <span class="input-group-btn">
						        <button class="btn btn-success tom-tambah" type="button">Tambah!</button>
						      </span>
						    </div>
          				</div>
          			 </div>

          			 <div class='row mart-10'>
          			 	<div class='col-md-12'>
          			 		<div class="panel panel-default">
							  <div class="panel-body">
							   	

							  	<?php echo $list; ?>

	

							  </div>
							</div>
          			 	</div>
          			 </div>
          			
          		</div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
