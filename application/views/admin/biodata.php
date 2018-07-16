<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Biodata
            <small>Masukan Biodata</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Biodata</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label for="nama-bio">Nama</label>
                <input type="text" class="form-control" id="nama-bio" value="<?php echo $data['nama'] ?>" />
              </div>


              <div class="form-group">
               <label for="foto-bio">Foto</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="foto-bio" value="<?php echo $data['foto'] ?>" /><span class="input-group-addon btn btn-success bio-foto-btn">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='foto-bio'></div>
              </div>

              <div class="form-group">
                <label for="link-fb">Alamat Facebook</label>
                <input type="text" class="form-control" id="link-fb" value="<?php echo $data['link_fb'] ?>" />

              </div>

               <div class="form-group">
                <label for="deskripsi-singkat">Deskripsi Singkat</label>
                <textarea class="form-control" id="deskripsi-singkat"><?php echo $data['deskripsi_singkat'] ?></textarea>
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi (Rinci)</label>
                <textarea class="form-control" id="deskripsi-editor"><?php echo $data['deskripsi'] ?></textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-sm btn-primary update-biodata">Simpan</button>
              </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





