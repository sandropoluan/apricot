<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori Galeri
            <small>Pengaturan kategori</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Kategori galeri</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="row">
                <div class="col-md-6">

                  <div class="form-inline">
                    <div class="form-group">
                    <button class="btn btn-sm btn-primary btn-new-kategori"><i class="fa fa-plus"></i> New</button>
                    </div>

                     <div class="form-group">
                      <input type="text" class="form-control new-kategori" style="display:none" data-toggle='tooltip' data-placement='top' title='Tekan ENTER untuk save'>
                    </div>

                  </div>

              <ul class="list-group group-kategori" style="margin-top:20px">
            <?php 

              foreach ($hasil as $value) {
                $show=$value['aktif']=='Y'?"<i data-id='".$value['id']."' class='fa fa-eye disable-kategori'></i>":"<i data-id='".$value['id']."' class='fa fa-eye enable-kategori' ></i>";

                echo "<li class='list-group-item' data-id='".$value['id']."'>

                <span data-toggle='tooltip' data-placement='top' title='Klik untuk mengedit' data-id='".$value['id']."' class='kategori-nama-wrap' >".$value['nama_kategori']."</span>

                <input data-toggle='tooltip' data-placement='right' title='Tekan ENTER untuk save' data-id='".$value['id']."'  type='text' class='kategori-nama' value='".$value['nama_kategori']."' style='display:none'/>

               

               <i class='fa fa-close delete-kategori' style='margin-left:15px;float:right;color:red;cursor:pointer' data-id='".$value['id']."'></i>

                $show
                </li>";
              }

            ?>
              </ul>

              </div>
            </div>

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





