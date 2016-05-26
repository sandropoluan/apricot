<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Selamat datang
            <small>ini adalah halaman utama administrator</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         

<div class="row">
            <div class="col-lg-3 col-xs-6">


              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $data['jumlah_artikel']; ?></h3>
                  <p>Artikel Tersimpan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="<?php echo base_url('admin/all_artikel') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">



              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data['jumlah_halaman']; ?></h3>
                  <p>Halaman</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-browsers"></i>
                </div>
                <a href="<?php echo base_url('admin/all_page') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->



            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data['jumlah_galeri']; ?></h3>
                  <p>Galeri Foto</p>
                </div>
                <div class="icon">
                  <i class="ion ion-images"></i>
                </div>
                <a href="<?php echo base_url('admin/all_galeri') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->



            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $data['jumlah_inbox']; ?></h3>
                  <p>Pesan belum dibaca</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email-unread"></i>
                </div>
                <a href="<?php echo base_url('admin/kontak_masuk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          </div>





  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          Baru Posting
        </div>
        <div class="box-body">

          <table class="table table-striped">
            <?php 

            foreach ($data["artikel_terbaru"] as $artikel ) {
               $label=$artikel['artikel_status']=='draft'?"label-warning":"label-primary";
               echo "<tr><td style='font-family: \"Source Sans Pro\" ;'><a style='color:#000; ' href='".base_url("admin/artikel/$artikel[artikel_id]")."'><strong>".character_limiter($artikel['artikel_judul'],75)."</strong></a>

               <br><span class='label pull-right $label'>$artikel[artikel_status]</span>

               </td></tr>";
            }

             ?>
          </table>



        </div>
        <div class="box-footer"></div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          Hit Artikel
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <?php 

            foreach ($data["hit_artikel"] as $artikel ) {
               $label=$artikel['artikel_status']=='draft'?"label-warning":"label-info";
               echo "<tr><td style='font-family: \"Source Sans Pro\" ;'><span class='badge badge-info'>$artikel[artikel_dibaca]x</span> <a style='color:#00a65a ; ' href='".base_url("admin/artikel/$artikel[artikel_id]")."'><strong>".character_limiter($artikel['artikel_judul'],70)."</strong></a> 

               <br><span class='label pull-right $label'>$artikel[artikel_status]</span>

               </td></tr>";
            }

             ?>
          </table>




        </div>
        <div class="box-footer"></div>
      </div>
    </div>
  </div>


<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-image"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Gambar Artikel </span>
          <span class="info-box-number"><?php echo $data['jumlah_gambar_artikel']; ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-image"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Gambar Galeri</span>
          <span class="info-box-number"><?php echo $data['jumlah_gambar_galeri']; ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-navicon"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Kategori Artikel</span>
          <span class="info-box-number"><?php echo $data['jumlah_kategori_artikel']; ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tags</span>
          <span class="info-box-number"><?php echo $data['jumlah_tags']; ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
  </div>

  

  <div class="row">
    <div class="col-md-4 col-xs-12">

        <div class="box box-warning">
          <div class="box-header with-border">
            Artikel Admin
          </div>
          <div class="box-body">
       <canvas id="chart-area" height="300" width="300"></canvas>

          </div>
          <div class="box-footer"></div>
        </div>



       

    </div>   

    <div class="col-md-8 col-xs-12"> 

    <div class="box box-danger">
          <div class="box-header with-border">
            Hiburan
          </div>
          <div class="box-body">

     <div id="flappy-bird-reborn"></div>


          </div>
          <div class="box-footer"></div>
        </div>




    </div> 
  </div>


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   