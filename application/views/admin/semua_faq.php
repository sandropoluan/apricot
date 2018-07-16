<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ
            <small>Semua FAQ</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">FAQ</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width:50px">
                   No
                  </th>
                  <th>Pertanyaan</th>
                  <th style="width:150px"></th>
                </tr>
              </thead>
              <tbody>
               <?php
               
               $no=1;
               foreach($faq as $f){
                echo "<tr>
                  <td>$no</td>
                  <td>$f[pertanyaan]</td>
                  <td>
                    <a class='btn btn-sm btn-success' href='".base_url("admin/faq/$f[id]")."'>Edit</a>
                    <div class='btn btn-sm btn-danger hapus-faq' data-id='$f[id]'>Hapus</div>
                  </td>
                </tr>";
                $no++;
               }
               
               ?>
              </tbody>
            </table>

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





