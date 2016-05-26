<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tema
            <small>Pengaturan Tema</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Tema</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-info">
          	<div class="box-body">

          		<div class="form-group">
          			<button class="btn btn-sm btn-primary"  id='upload-tema-tombol'><i class='fa fa-upload'></i> Upload Tema Baru</button>
          		</div>


               <div id='upload-tema-container' style='display: none'>
              <div class="form-group">
                <label>Pilih tema .zip</label>
                <input type="file" id="tema-zip"/>
              </div>

              <div class="form-group">
                <button class='btn btn-sm btn-info upload-aksi-zip'>Upload</button>
              </div>
              </div>
    
          </div>
        </div>

        <div class="box box-warning">
          	<div class="box-body">

 <div class="row">
<?php 

foreach ($tema_terinstal as $tema) {
	echo "<div class='col-lg-4 col-md-4 col-sm-6' style='margin-bottom:30px;'>";
	echo "<div class='tema-container'>";

	if($tema['aktif']=='Y'){
		echo "<i class='ion ion-checkmark-circled terpilih'></i>";
	} else {
		echo "<i class='ion ion-checkmark-round aktifkan aktifkan-tema' data-id='$tema[id]'></i>";
		echo "<i class='ion ion-android-close  hapus hapus-tema' data-id='$tema[id]'></i>";
	}

	echo "<img class='screenshot_tema' src='".base_url("an-theme/".$tema["nama_tema"]."/".$tema["screenshot"])."' />";

	echo "<div class='overlay'></div>";

	echo "<div class='caption'>
		Theme: $tema[nama_tema] | Oleh: <a href='$tema[web]' target='_blank' > $tema[author]</a>
	</div>";

	echo "</div>"; //.tema-container
	echo "</div>";
}

 ?>
 </div> 
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





