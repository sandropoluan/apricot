<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Galeri
            <small><?php echo $title; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active"><?php echo $title; ?></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">

              <div class="form-group"> 
                <label for="nama-galeri">Nama</label>
                <input type="text" class="form-control" id="nama-galeri" value="<?php echo "$data[nama]" ?>" />
                <input type='hidden' class='sesi-from_galeri' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
                <input type='hidden' class='id_galeri' value='<?php echo $data['id'] ?>' >
            
              </div>

              <div class="form-group"> 
                <label for="seo_url">SEO URL</label>
                  <div class="input-group">
                    <div class="input-group-addon"><?php echo base_url() ?>galeri/00-</div>
                         <input type='text' class='form-control' name='seo_url' id='seo_url' placeholder='field ini akan otomatis terisi ketika anda mengetikan judul artikel. Tentu saja anda dapat mengeditnya' value='<?php echo $data['url']  ?>' >
                         <div class="input-group-addon">.html
                         </div>
                      </div>
              </div>

              <div class="form-group">
                <label for="deskripsi-galeri">Deskripsi</label>
                <textarea class="form-control" id="deskripsi-galeri"><?php echo $data['deskripsi'] ?></textarea>
              </div>

            <div class="form-group">
              <label>Foto Gallery</label> <small>foto boleh banyak</small>
              <div class="dropzone well well-sm foto_galeri">
              </div>
            </div>



              <?php 

               if($foto!==false){
               
              ?>

              <div class="form-group">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="well grid galeri_area" >
              
                  <?php 
                  foreach ($foto AS $gmb){
                    echo "<div id='$gmb[id_foto]' class='grid-item gallery-img-container'>

                    <img src='".base_url()."an-component/media/upload-galeri-thumbs/".$gmb['nama_foto']."'>



                   <span class='delete_btn_container'>
                     <span class='fa fa-pencil-square-o edit-deskripsi' id='$gmb[id_foto]' data-toggle='tooltip' data-plecement='top' title='Ubah deskripsi'></span>&nbsp;
                     <span class='fa fa-times delete_btn' data-toggle='tooltip' placement='top' title='Hapus foto'></span>
                   </span>

                  <div class='desk-edit-wrap' id='$gmb[id_foto]'>

                  <div class='col-md-12'>
                    <div class='form-group'>
                     <textarea class='form-control desk-foto-text' id='$gmb[id_foto]'>$gmb[deskripsi_foto]</textarea>                    
                     </div>
                    <div class='form-group'>
                    <button class='btn btn-sm btn-success btn-simpan-desk' id='$gmb[id_foto]'>Simpan</button>

<div id='floatingBarsG' class='$gmb[id_foto]'>
  <div class='blockG' id='rotateG_01'></div>
  <div class='blockG' id='rotateG_02'></div>
  <div class='blockG' id='rotateG_03'></div>
  <div class='blockG' id='rotateG_04'></div>
  <div class='blockG' id='rotateG_05'></div>
  <div class='blockG' id='rotateG_06'></div>
  <div class='blockG' id='rotateG_07'></div>
  <div class='blockG' id='rotateG_08'></div>
</div>

                    </div>
                   </div>

                  </div>


                    </div>";
                  }
                  ?>
                  </div>
                 </div>
                </div>
               </div>

              <?php
                }
              ?>



             <div class="form-group">
              <label for="galeri-status">Publish</label>
              <select id="galeri-status" class="form-control">

                <?php 
                $pilihan=array("publish","draft");
                foreach ($pilihan as $value) {
                  $selected=($value == $data['status'])?"selected":"";
                  echo "<option value='$value' $selected>$value</option>";
                }
                ?>

              </select>

              </div>

              <div class="form-group">
                <label for="galeri-kategori">Kategori</label>
                <select id="galeri-kategori" class="form-control">
                  <option value="0">Pilih Kategori</option>
                  <?php 

                    foreach ($kategori as  $kat) {
                      $selc=($kat['id']==$data['kategori'])?'selected':'';
                      echo "<option value='$kat[id]' $selc>$kat[nama_kategori]</option>";

                           }                  

                  ?>

                </select>
              </div>


              <div class="form-group"> 
                <label for="featured-image">Featured Image</label> <small>url gambar</small>
                <div class="input-group">
                  <input type="text" class="form-control" id="featured-image"  value="<?php echo $data['featured'] ?>" /><span class="input-group-addon btn btn-success btn-galeri">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='featured-image'></div>
              </div>


              <div class="form-group">
                <label for="meta-keyword">Meta Keyword</label>
                <input type="text" class="form-control" id="meta-keyword" value="<?php echo $data['meta_keyword'] ?>"/>
              </div>

              <div class="form-group">
                <label for="meta-description">Meta Deskripsi</label>
                <input type="text" class="form-control" id="meta-description" value="<?php echo $data['meta_deskripsi'] ?>" />
              </div>

              <div class="form-group">
                <label for="og-image">OG Image</label> <small>url gambar</small>
                <div class="input-group">
                  <input type="text" class="form-control" id="og-image" value="<?php echo $data['og_image'] ?>"/><span class="input-group-addon btn btn-success   btn-og-galeri">Pilih</span>
                </div>
                <div class="well well-lg foto-produk-preview-area"  data-area='og-image'></div>
              </div>

              <div class="form-group">
                <label for="og-deskripsi">OG Deskripsi</label>
                <input type="text" class="form-control" id="og-deskripsi" value="<?php echo $data['og_deskripsi'] ?>"/>
               </div>



              <div class="form-group">
                <button class="btn btn-primary submit-galeri" id="<?php echo $data['id'] ?>"> Simpan</button>
               </div>


          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





