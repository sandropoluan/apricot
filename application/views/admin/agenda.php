<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Agenda
            <small>Input Agenda</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Agenda</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label for="agenda-judul">Judul</label>
                <input type="text" class="form-control" id="agenda-judul" value="<?php echo $agenda_judul ?>" />
              </div>


              <div class="form-group">
               <label for="agenda-foto">Foto</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="agenda-foto" value="<?php echo $agenda_foto ?>" /><span class="input-group-addon btn btn-success agenda-foto-btn">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='agenda-foto'></div>
              </div>



              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi-editor"><?php echo $agenda_deskripsi ?></textarea>
              </div>

              <div class="form-group">
                <label for="tanggal-mulai">Tanggal Agenda</label>
                <input type="text" class="form-control" id="tanggal-mulai" value="<?php echo $agenda_tanggal_mulai ?>">
              </div>


              <div class="form-group">
                <label for="tanggal-selesai">Tanggal Selesai</label>
                <input type="text" class="form-control" id="tanggal-selesai" value="<?php echo $agenda_tanggal_selesai ?>">
              </div>

              <div class="form-group">
                <button class="btn btn-sm btn-primary update-agenda" data-id="<?php echo $agenda_id ?>">Simpan agenda</button>
              </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





