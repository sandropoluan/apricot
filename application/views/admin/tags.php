<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>



<div class='content-wrapper'>

	<div class="content-header">
	<h1>Tag <small>Tambahkan dan kelola tag</small></h1>
	<ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">tags </li>
           
          </ol>
	</div>
	<div class="content">

	<div class="row">
		<div class="col-sm-5">
			<div class="box box-warning">
				<div class="box-header with-border">
					<h4>Tambahkan tag baru</h4>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="tags">Tag</label>
						<input type="text" class="form-control" id="tags">
					</div>

					<div class="form-group">
						<label for="slug">URL friendly</label>
						<input type="text" class="form-control" id="slug">
					</div>

					<button class="btn btn-warning btn-sm tambah-tag-btn">Tambah tag baru</button>
					</div>

				</div>

			</div>
		<div class="col-sm-7">
			<div class="box box-success">
				<div class="box-header with-border">
					<h4>Pengaturan Tags</h4>
				</div>
				<div class="box-body">
					<table class="slug-table table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Tag</th>
								<th>URL friendly</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php
							echo $hasil; 
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Tag</th>
								<th>URL friendly</th>
								<th>Hapus</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			
		</div>
	</div>
 </div>
</div>