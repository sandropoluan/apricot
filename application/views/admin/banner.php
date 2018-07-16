<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Group banner
            <small>Buat group banner</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li><a href="<?php echo $burl; ?>/group_banner">Group banner</a></li>
            <li class="active">Buat group</li>           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group">
                <label for="">Nama group</label>
                <input type="text" class="form-control" id="nama-group" value="<?php echo $banner['nama'] ?>"/>
              </div>




          </div>
        </div>

          <div class="box box-success">
          	<div class="box-body">

              <div class="form-group">
                <div class="btn btn-sm btn-warning" id="add-button-toggle"><i class="fa fa-plus"></i></div>
              </div>

              <div style="display:none" id="new-banner-area">

              <div class="form-group"> 
                <label for="">Gambar</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="new-banner-field"/><span class="input-group-addon btn btn-success btn-new-banner-field">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='new-banner-field'></div>
              </div>


                <div class="form-group">
                  <label for="">Header</label>
                  <input type="text" class="form-control" id="header-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Caption</label>
                  <input type="text" class="form-control" id="caption-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Alt text</label>
                  <input type="text" class="form-control" id="alt-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Link text</label>
                  <input type="text" class="form-control" id="link-text-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Link href</label>
                  <input type="text" class="form-control" placeholder="https://... atau #" id="link-href-banner-field"/>
                </div>

                <div class="form-group">
                 <div class="btn btn-sm btn-success" id="submit-new-banner-field">Submit</div>
                </div>

              </div>

          </div>
        </div>

          <div class="box box-danger">
          	<div class="box-body">
                  <table class="table table-striped table-responsive">
                    <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Header</th>
                        <th>Caption</th>
                        <th>Alt text</th>
                        <th>Link text</th>
                        <th>Link href</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="body-table">
                      <?php
                        foreach($item_banner as $item){
                          echo "
                            <tr class='item-row' data-id='$item[id]'>
                              <td class='gambar'>$item[gambar]</td>
                              <td class='header'>$item[header]</td>
                              <td class='caption'>$item[caption]</td>
                              <td class='alt-text'>$item[alttext]</td>
                              <td class='link-text'>$item[link_text]</td>
                              <td class='link-href'>$item[link_href]</td>
                              <td class='aksi'>
                                <div class='btn btn-success btn-edit-banner'>Edit</div> 
                                <div class='btn btn-danger btn-hapus-banner'>Hapus</div>
                              </td>
                            </tr> 
                          ";
                        }
                      ?>
                    </tbody>
                  </table>

                  <div style="margin-top:10px">
                      <div class="btn btn-info btn-sm" id="simpan-perubahan-banner" data-id="<?php echo $banner['id_group'] ?>">Simpan perubahan</div>
                  </div>

            </div>
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit banner</h4>
      </div>
      <div class="modal-body">

              <div class="form-group"> 
                <label for="">Gambar</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="edit-banner-field"/><span class="input-group-addon btn btn-success btn-edit-banner-field">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='edit-banner-field'></div>
              </div>


                <div class="form-group">
                  <label for="">Header</label>
                  <input type="text" class="form-control" id="edit-header-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Caption</label>
                  <input type="text" class="form-control" id="edit-caption-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Alt text</label>
                  <input type="text" class="form-control" id="edit-alt-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Link text</label>
                  <input type="text" class="form-control" id="edit-link-text-banner-field"/>
                </div>

                <div class="form-group">
                  <label for="">Link href</label>
                  <input type="text" class="form-control" placeholder="https://... atau #" id="edit-link-href-banner-field"/>
                </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="tutup-modal-edit">Tutup</button>
        <button type="button" class="btn btn-primary" id="submit-modal-edit" data-id="0">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




