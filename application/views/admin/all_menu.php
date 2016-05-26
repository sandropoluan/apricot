<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header" id='MENU-YANG-MAU-DI-HIDE'>
          <h1>
            Menu
            <small>Pengaturan Menu</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Menu</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <div class="form-group">
            <button class="btn btn-primary btn-sm menu-baru-btn">Menu Baru</button>
          </div>

          <div class="box box-warning menu-baru-box">
            <div class="box-body">

              <div class="form-group">
                <h4>Tambahkan Menu Baru</h4>
              </div>

              <div class="form-group">
                <label for="nama-menu">Nama Menu</label>
                <input type="text" id="nama-menu" class="form-control">
              </div>

              <div class="form-group">
                <label for="code-menu">Code Unik</label> <span class="fa fa-question-circle" style="color:blue;cursor: pointer" data-toggle="popover" data-placement="top" title="Code Unik" data-content="Anda perlu memasukan code unik untuk mengenali menu buatan anda sendiri. Gunakan code seunik mungkin untuk mencegah code sudah pernah digunakan oleh orang lain, atau nanti bisa digunakan oleh orang lain. Format terbaik adalah nama_karakterRandom, misalnya: john_jh123 "></span>
                <input type="text" id="code-menu" class="form-control" placeholder="contoh:: namaAnda_C0d3Ac4k">
              </div>

              <div class="form-group">
                <button class="btn btn-xs btn-success buat-menu-btn">Buat Menu</button>
              </div>

          </div>
        </div>




          <div class="box box-info">
          	<div class="box-body">

                <table class="slug-table table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr>
                    <th>Menu</th>
                    <th>Code Unik</th>
                    <th>Date</th>
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





