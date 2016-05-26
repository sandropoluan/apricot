<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pihak Ketiga
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">pihak ketiga</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

<div class='row'>

<div class='col-md-6'>
          <div class="box box-warning">

            <div class="box-body">

              <form class='pihak_ketiga' method='POST' action='<?php echo base_url('AN_ajax_admin/pihak_ketiga'); ?>'>

                <div class='form-group'>
                  <label>reCaptcha site key</label>
                  <input class='form-control' name='recaptcha_key' value="<?php echo $pihakketiga['recaptcha_key'] ?>" />
                </div>

                <div class='form-group'>
                  <label>reCaptcha secret key</label>
                  <input class='form-control' name='recaptcha_secret_key' value="<?php echo $pihakketiga['recaptcha_secret_key'] ?>" />
                </div>

                <div class='form-group'>
                  <label>Disqus unique name</label>
                  <input type='text' name='disqus_unique_name' class='form-control' value="<?php echo $pihakketiga['disqus_unique_name'] ?>" />
                </div>

                <div class='form-group'>
                  <label>Script Google Analytics <small>( tanpa tag <code>&lt;script&gt;</code>)</small></label>
                       <textarea class="form-control" style="height: 200px" id="google-analytics"><?php echo $pihakketiga['script_google_analytics']; ?></textarea>

                 </div>

                <div class='form-group'>
                  <button class='btn btn-sm btn-info'>Simpan</button>
                </div>
              </form>

          </div>
        </div>
</div>


<div class='col-md-6'>
          <div class="box box-info">

            <div class="box-body">
            <div class='box-header'> <H4>Panduan</H4> </div>
          </div>
        </div>
</div>

</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





