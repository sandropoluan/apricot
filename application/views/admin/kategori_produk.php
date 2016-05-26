<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori
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


              <div class="form-inline">
                   <div class="form-group">
                      <button class="btn btn-primary btn-sm btn-new-kategori"><i class="fa fa-plus"></i> New</button>

                      <input style="display: none" type="text" class="form-control new-kategori" data-toggle="tooltip" data-id="0" data-placement="top" title="" data-original-title="Tekan ENTER untuk save">
                   </div>
              </div>


              <ul class="list-group list_kategori_produk konten-list" data-id="0">

                <?php 
                  echo $hasil;
                ?>


              </ul>

              
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





