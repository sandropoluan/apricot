<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>


     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Artikel
            <small>Semua Artikel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         		<div class="box box-warning">
				<div class="box-body">

					<table class="slug-table table table-bordered table-striped table-responsive dt-responsive" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Judul Artikel</th>
							<th>Kategori Artikel</th>
							<th>Status</th>
							<th>Posting</th>
							<th>Last Edit</th>
							<th>Action</th>
						</tr>
						</thead>

						<tbody>
							<?php
							echo $artikels;
							?>
						</tbody>
					</table>


				</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

