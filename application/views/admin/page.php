<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page
            <small><?php echo $title; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active"><?php echo $title; ?></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label for="judul_page">Judul Page</label>
                <input type="text" class="form-control" id="judul_page" value="<?php echo $data['judul']; ?>" />

                <input type="hidden" id="id_page" value="<?php echo $data['id']; ?>"/>
              </div>

              <div class="form-group">
                <label for="url_page">SEO URL</label>
                <div class="input-group">
                  <span class="input-group-addon"><?php echo base_url() ?>page/00-</span>
                  <input type="text" class="form-control" id="url_page" value="<?php echo $data['url']; ?>"/>
                </div>
              </div>

              <div class="form-group">
                <label for="isi_page">Isi Page</label>
                <textarea class="form-control" id="isi_page"><?php echo $data['isi'];?></textarea>
              </div>

              <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="featured_image" value="<?php echo $data['foto']; ?>" />
                  <span class="input-group-addon btn btn-success btn-foto">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='featured_image'></div>
              </div>

    
              <div class="form-group">
                <label for="keywords">Meta Keywords</label>
                  <input type="text" class="form-control" id="keywords" value="<?php echo $data['keywords']; ?>" />
              </div>

              <div class="form-group">
                <label for="description">Meta Description</label>
                  <input type="text" class="form-control" id="description" value="<?php echo $data['description']; ?>" />
              </div>

              
              <div class="form-group">
                <label for="status_page">Status</label>
                <select class="form-control" id="status_page">
                  <?php
                  $nilai=array("published","draft");
                  foreach ($nilai as  $value) {
                    $select=$value==$data["status"]?"selected":"";
                    echo "<option value='$value' $select>$value</option>";
                  }
                   ?>
                </select>
              </div>

              <div class="form-group">
                <label for="js">Custom Javascript</label>
                <textarea class="form-control" id="js"><?php echo $data['javascript'];?></textarea>
              </div>

              
              <div class="form-group">
                <button class="btn btn-sm btn-primary" id="save-page">Simpan</button>
              </div>
              
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





