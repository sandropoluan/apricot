<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Email
            <small>Reply  Email</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li><a href="<?php echo base_url('admin/kontak_masuk') ?>">Inbox</a></li>
            <li class="active">Reply pesan</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" id="judul-pesan" value="Re: <?php echo $pesan['judul'] ?>" />
              </div>

              <div class="form-group">
                <label>To</label>
                <input type="text" class="form-control" id="tujuan-email" value="<?php echo $pesan['email'] ?>" disabled/>
              </div>


              <div class="form-group">
               <label >Pesan</label>

               <textarea  id="pesan-email">
                <strong>Dear <?php echo $pesan['nama'] ?></strong>
                <br><br><br><br><br><hr>
                <blockquote>
                 <?php 
                  echo "<i>Pada $pesan[tanggal] $pesan[nama] menulis: </i>";
                  ?>
                  <br>
                  <br>
                  <?php echo nl2br($pesan['pesan']) ?>
                </blockquote>
                 </textarea>

              </div>


              <div class="form-group">
                <button class="btn btn-sm btn-primary kirim-email" data-id="<?php echo $pesan['id'] ?>">Kirim</button>
              </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





