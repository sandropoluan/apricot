<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

<div class="content-wrapper">

 <section class="content-header">
 	<h1>News Ticker 		
 	<small>pengaturan news ticker</small>
 	</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">News Ticker</li>           
          </ol>

 </section>

 <section class="content">

 	<div class="box box-warning">
 		<div class="box-body">

<h4>Tambahkan berita</h4>

 			<div class='form-group'>
 				<label for='berita'>Berita</label>
 				<input type='text' class='form-control' id='berita-ticker' />
 			</div>

 			<div class='form-group'>
 				<label for='link-ticker'>Link</label>
 				<input type='text' class='form-control' id='link-ticker' />
 			</div>

 			<div class='form-group'>
 				<button class='btn btn-sm btn-info tambah-berita'>Tambahkan</button>
 			</div>

 		</div>
 	</div>



 	<div class="box box-info">
 		<div class="box-body">

 			<table id='news-ticker' class='table table-hover table-striped table-bordered table-responsive'>
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Berita</th>
 						<th>Link</th>
 						<th>Hapus</th>
 					</tr>
 				</thead>
 				<tbody class='body-table-berita'>

<?php 
$no=1;
	foreach ($hasil as $berita) {
		echo "<tr data-id='$berita[id]'>";
		echo "<th class='nomor'>$no</th>";
		echo "<td>
				<span class='berita-text editable-span' data-id='$berita[id]'>$berita[berita]</span>
				<input type='text' class='form-control form-berita sembunyi' data-id='$berita[id]' value='$berita[berita]' />
			</td>";	
		echo "<td>
				<span class='link-text editable-span' data-id='$berita[id]'>$berita[link]</span>
				<input type='text' class='form-control form-link sembunyi' data-id='$berita[id]' value='$berita[link]' />
			</td>";
		echo "<td><i class='fa hapus-news fa-close hapus-icon' data-id='$berita[id]'></i></td>";


		echo "</tr>";

		$no++;
	}
?>

 				</tbody>
 			</table>

 		</div>
 	</div>




 </section>



</div>