<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

<div class="content-wrapper">

 <section class="content-header">
 	<h1>Banner Depan 		
 	<small>pengaturan banner</small>
 	</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Informasi</li>           
          </ol>

 </section>

 <section class="content">

 	<div class="box box-warning">
 		<div class="box-body">

 			<div class="form-group">
 				<button class="btn btn-info add-banner-baru"><i class="fa fa-plus"></i></button>
 			</div>

 			<div class="row">
 			<div class="col-md-12 form-banner-baru">
 			<div class="form-group">
 				<label for="gambar-banner">Gambar</label>
 				<div class="input-group">
 					<input type="text" class="form-control" id="gambar-banner" /><span class="input-group-addon btn btn-primary pilih-banner" style="cursor:pointer">Pilih</span>
 				</div>
				 <div class="well well-lg foto-produk-preview-area"  data-area='gambar-banner'></div>
 			</div>


 			<div class="form-group">
 				<label for="header-banner">Header</label>
 				<input type="text" id="header-banner" class="form-control" />
 			</div>

 			<div class="form-group">
 				<label for="header-caption">Caption</label>
 				<textarea id="header-caption" class="form-control"> </textarea>
 			</div>

 			<div class="form-inline">
 				<div class="form-group">
 					<label for="link-banner">Link</label>
 					<input type="text" class="form-control" id="link-banner" />
 				</div>
 				<div class="form-group">
 					<label for="link-text">Link Text</label>
 					<input type="text" class="form-control" id="link-text" />
 				</div>

 			</div>


 			<div class="form-group" style="margin-top:15px;">
 				<button class="btn btn-primary banner-baru">Simpan</button>
 			</div>


 		</div>
 		</div>


 		</div>
 	</div>



	<div class="box box-info">

		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Header</th>
							<th>Caption</th>
							<th>Link</th>
							<th>Link Text</th>
							<th>Gambar</th>						
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="body-table-banner">

					<?php

					foreach ($hasil as  $value) {
						echo "<tr data-id='$value[id]'>";

						echo "<td>";
						echo "<span class='banner-header-name editable-span' data-id='$value[id]' >$value[header]</span>";
						echo "<input type='text' data-id='$value[id]' value='$value[header]' class='form-control banner-header-field sembunyi' />";
						echo "</td>";

						echo "<td>";
						echo "<span class='banner-caption-name editable-span' data-id='$value[id]'>$value[caption]</span>";
						echo "<input type='text'  data-id='$value[id]' value='$value[caption]' class='form-control banner-caption-field sembunyi' />";
						echo "</td>";

						echo "<td>";
						echo "<span class='banner-link-name editable-span' data-id='$value[id]'>$value[link_href]</span>";
						echo "<input type='text' data-id='$value[id]' value='$value[link_href]' class='form-control banner-link-field sembunyi' />";
						echo "</td>";

						echo "<td>";
						echo "<span class='banner-link-text-name editable-span' data-id='$value[id]'>$value[link_text] </span>";
						echo "<input type='text' data-id='$value[id]' value='$value[link_text]' class='form-control banner-link-text-field sembunyi' />";
						echo "</td>";

						echo "<td>";
						echo "<span class='banner-gambar-name editable-span' data-id='$value[id]'>$value[gambar] </span>";
						echo "
						<div class='wrap-group sembunyi' data-id='$value[id]'>
						<div class='input-group'>
						<input type='text' data-id='$value[id]' value='$value[gambar]' class='form-control banner-gambar-field' id='target-field-gambar-$value[id]' data-toggle='tooltip' data-placement='top' title='tekan ENTER untuk menyimpan' />
						<span class='input-group-addon btn btn-primary tombol-pilih-gambar' data-select='' data-id='$value[id]'>pilih</span>
						</div>
						</div>
						";
						echo "</td>";

					    echo "<td>";
					    echo "<i class='fa hapus-banner fa-close hapus-icon' data-id='$value[id]'></i>";
						echo "</td>";
						
						echo "</tr>";
					}

					 ?>

					</tbody>

				</table>
			</div>
		</div>

	</div>


 </section>



</div>