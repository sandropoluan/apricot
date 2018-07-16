<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Banner
            <small>Group banner</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Group banner</li>           
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
                  <th>Nama</th>
                  <th style="width:170px">Fungsi</th>
                  <th style="width:180px"></th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no=1;
                foreach($groups as $banner){
                  echo "<tr>
                    <td>$no</td>
                    <td>$banner[nama]</td>
                    <td>group_banner($banner[id_group])</td>
                    <td>
                    <a class='btn btn-sm btn-success' href='".base_url("admin/banner/$banner[id_group]")."'>Edit</a>
                    <div class='btn btn-sm btn-danger hapus-group-banner' data-id='$banner[id_group]'>Hapus</div>
                    </td>
                  </tr>";
                }
                
                ?>
              </tbody>
            </table>
              
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





