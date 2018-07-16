<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Menu
            <small>Pengaturan Menu</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li><a href="<?php echo $burl; ?>/all_menu">Menu</a></li><li class="active"><?php echo $nama_menu; ?></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">



              <div class="row">

                <div class="col-md-4">
                  <div class="box box-info">
                    <div class="box-body">
                     
                      <ul class="list-group">

                        <li class="list-group-item" data-url='<?php echo base_url();?>' data-nama='Home' data-code='home'>Home <span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>

                        <li class="list-group-item" data-url='<?php echo base_url("privacy");?>' data-nama='Privacy' data-code='privacy'>Privacy <span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>

                        <li class="list-group-item" data-url='<?php echo base_url("syarat-dan-ketentuan");?>' data-nama='Syarat dan ketentuan' data-code='syarat-ketentuan'>Syarat dan ketentuan <span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>

                        <li class="list-group-item" data-url='<?php echo base_url("disclaimer");?>' data-nama='Disclaimer' data-code='disclaimer'>Disclaimer<span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>

                        <li class="list-group-item" data-url='<?php echo base_url("about-us");?>' data-nama='About Us' data-code='about-us'>About Us<span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>

                        <li class="list-group-item" data-url='<?php echo base_url("faq");?>' data-nama='FAQ' data-code='faq'>FAQ<span class="tambahkan-ke-menu fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span></li>


                        <li class="list-group-item">Custom <span class="custom-menu fa fa-gear"></span>

                          <div class="row custom-menu-box">
                            <div class="col-md-12 well">

                             <div class="form-group">
                              <label><small>Nama</small></label>
                              <input type="text" class="form-control" id="nama-menu-custom">
                             </div>

                             <div class="form-group">
                              <label><small>URL</small></label>
                              <input type="text" class="form-control" id="url-menu-custom">
                             </div>

                             <div class="form-group">
                              <label><small>Target Link</small></label>
                              <select class="form-control" id="target-menu-custom">
                               <?php 
                                $_target=array("_self","_blank","_parent","_top");
                                foreach($_target AS $d){
                                  echo"<option value='$d'>$d</option>";
                                }
                               ?>
                              </select>
                             </div>

                             <span class="tambahkan-ke-menu2 fa fa-sign-in" data-toggle='tooltip' data-placement='top' title='tambahkan ke menu'></span>

                            </div>
                          </div>

                        </li>
                      </ul>


                    </div>
                  </div>

                </div>




                <div class="col-md-8">

                  <div class="box box-success">
                    <div class="box-body">
                      

              <ul class="sort list-group menu_manager" id="0">
                 <span class='nbsp'> &nbsp; </span>
                <?php

                echo "$hasil";

                 ?>



              </ul>
              <div class="target-scroll"></div>

<button class="btn btn-sm btn-primary update-posisi">Update Posisi</button>

                    </div>
                  </div>

                </div>
              </div>
           



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





