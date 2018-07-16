<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Download
            <small>Input file</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Download</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label for="nama-file">Nama File</label>
                <input type="text" class="form-control" id="nama-file" value="<?php echo $file_nama ?>" />
                <input type='hidden' id='sesi-form-upload' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
                <input type='hidden' id='id-file-download' value='<?php echo $file_id ?>' >

              </div>


            <div class="form-group">
              <label>Upload file</label>
              <div class="dropzone well well-sm file_download">
              </div><br>
            <?php if($file_id>0){ ?>
             File sekarang: <span class="label label-warning"><?php echo $file ?></span>
             <?php } ?>
            </div>



              <div class="form-group">
                <label for="deskripsi-file">Deskripsi</label>
                <textarea class="form-control" id="deskripsi-file"><?php echo $deskripsi_file ?></textarea>
              </div>



              <div class="form-group">
                <button class="btn btn-sm btn-primary simpan-file" data-id="<?php echo $file_id ?>">Simpan file</button>
              </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





