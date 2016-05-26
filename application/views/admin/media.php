<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Media
            <small>pengaturan media</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">




         <div class="box box-warning  ">
            <div class="box-body">
              <div class="multiple-area well well-sm foto_gallery_artikel dropzone" ></div>

              <table id="media-tab" class="media-table table table-bordered table-striped dt-responsive ">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Size</th>
                    <th>Date</th>
                    <th>Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                   echo $daftar_foto;
                  ?>
                  
                </tbody>
              </table>

             
            </div>
       </div>


         <div class="box box-success">
            <div class="box-body">
              <table class="media-table table table-bordered table-striped dt-responsive">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Artikel</th>
                    <th>Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  echo $hasil;
                  ?>
                </tbody>
              </table>

            </div>


         </div>




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   