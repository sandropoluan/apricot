<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SMTP
            <small>Outgoing Server</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Pengaturan SMTP</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label>Host</label>
                <input type="text" class="form-control" id="host-email" value="<?php echo $smtp['host'] ?>" />
              </div>

              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama-email" value="<?php echo $smtp['nama'] ?>" />
              </div>


              <div class="form-group">
               <label >User (email)</label>
                 <input type='text' class="form-control" id='user-email' placeholder='Cth : nama@domain.com' value="<?php echo $smtp['user'] ?>"/>
              </div>


              <div class="form-group">
               <label >Password</label>
                 <input type='password' class="form-control" id='password-email' />
              </div>


              <div class="form-group">
               <label >Port</label>
                 <input type='text' class="form-control" id='port-email' value="<?php echo $smtp['port'] ?>"/>
              </div>

              <div class="form-group">
              <?php

                $checked=$smtp['ssl_connection']=="Y"?"checked":"";

               ?>

                <label>SSL</label><br>
                <input  type='checkbox' id='ssl' <?php echo $checked ?> >      


              </div>

              <div class="form-group">
                <button class="btn btn-sm btn-primary update-smtp">Simpan</button>
              </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





