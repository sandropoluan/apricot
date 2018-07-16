<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Agenda
            <small>Semua Agenda</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Semua Agenda</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

                <table class="slug-table table  table-striped dt-responsive" id="table-agenda">
                  <thead>
                  <tr>
                    <th>Judul Agenda</th>
                    <th>Tanggal</th>
                    <th>Berakhir</th>
                    <th style='width: 80px'>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                  foreach ($agendas as $agenda) {
                    echo "<tr>
                    <td>$agenda[judul]</td>
                    <td>$agenda[tanggal_mulai]</td>
                    <td>$agenda[tanggal_selesai]</td>
                    <td><a class='btn btn-info btn-xs'  href='".base_url('admin/agenda/'.$agenda['id'])."'>Edit</a> <button class='btn btn-danger btn-xs hapus-agenda' data-id='$agenda[id]' >Hapus</button></td>
                    </tr>";
                  }
                    ?>
                  </tbody>
                </table>
           

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





