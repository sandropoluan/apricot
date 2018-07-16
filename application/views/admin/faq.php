<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Faq
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/">
            <i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li><a href="<?php echo base_url('admin/semua_faq') ?>">Semua Faq</a></li>
            <li class="active">Faq</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">
                <div class="form-group">
                  <label>Pertanyaan</label>
                  <input type='text' class='form-control pertanyaan-faq' value='<?php echo $faq['pertanyaan'] ?>'/>
                </div>

              <div class="form-group">
                <label for="deskripsi">Jawaban</label>
                <textarea class="form-control" id="jawaban-faq"><?php echo $faq['jawaban'] ?></textarea>
              </div>

              <div class="form-group">
               <div class="btn btn-success" id="submit-faq" data-id="<?php echo $faq['id'] ?>">Submit</div>
              </div>

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





