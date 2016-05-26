<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>


     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Galeri
            <small>Semua Galeri</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         		<div class="box box-warning">
				<div class="box-body">

					<table class="slug-table table table-bordered table-striped table-responsive dt-responsive">
						<thead>
						<tr>
							<th>Judul Galeri</th>
							<th>Status</th>
							<th>Posting</th>
							<th>Last Edit</th>
							<th>URL</th>
							<th>Action</th>
						</tr>
						</thead>

						<tbody>
							<?php
							echo $galeri;
							?>
						</tbody>
					</table>


				</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

