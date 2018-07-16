<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Informasi
            <small>informasi web</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Informasi</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-warning">
          	<div class="box-body">


          		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

          			<div class="panel panel-primary">
          				<div class="panel-heading" role="tab" id="head1">
          					<h4 class="panel-title">
          						<a href="#collapse1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse1">
          							Informasi Umum
          						</a>
          					</h4>
          				</div>
          				<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head1">
	          				<div class="panel-body">
	          					<div class="form-group">
	          						<label for="nama-web">Nama Web</label>
	          						<input type="text" class="form-control" id="nama-web" value="<?php echo $data['nama']; ?>" />
	          					</div>


                      <div class="form-group">
                        <label for="sleep_mode">Mode Sleep?</label>
                          <div class="form-inline">
                            <div class="form-group">

                              <select id="sleep_mode" class="form-control">

                                <?php 

                                  $sleep=array("N"=>"Tidak","Y"=>"Ya");
                                  foreach ($sleep as $key => $value) {
                                    $sel=($key==$data["sleep_mode"])?"selected":"";
                                   echo "<option value='$key' $sel >$value</option>";
                                  }

                                ?>

                              </select>

                            </div>
                            <div class="form-group">
                              <label for="sleep_sampai">sampai</label>
                              <input type="text" class="form-control" id="sleep_sampai" value="<?php echo $data['sleep_sampai']; ?>" />

                            </div>
                          </div>
                        </div>




                      <div class="form-group">
                        <label for="default-title">Default title</label>
                        <input type="text" id="default-title" class="form-control" value="<?php echo $data['default_title'] ?>" />
                      </div>

                      <div class="form-group">
                        <label for="pefix-title">Prefix sufix title</label>
                      <div class="form-inline">

                        <div class="form-group">
                        <input type="text" id="pefix-title" class="form-control" value="<?php echo $data['prefix_suffix_title'] ?>" />
                       </div>

                       <div class="form-group">
                        <select class="form-control" id="prefix-sbg">
                          <?php
                          $option_p=array('prefix'=>'Prefix', 'suffix'=>'Suffix', 'none'=>'Kosongkan');
                          foreach ($option_p as $k => $value) {
                            $select=$k==$data['prefix_suffix_sebagai']?'selected':'';

                            echo "<option value='$k' $select >$value</option> ";
                          }

                           ?>

                        </select>
                       </div>

                      </div>
                      </div>

	          					<div class="form-group">
	          						<label for="deskripsi">Deskripsi</label>
	          						<textarea class="form-control" id="deskripsi" ><?php echo $data['deskripsi']; ?></textarea>
	          					</div>

	          					<div class="form-group">

	          						<label for="favicon">Favicon</label>
	          						<div class="input-group">
	          						<input type="text" class="form-control" id="favicon" value="<?php echo $data['favicon']; ?>" />
	          						<span class="input-group-addon btn btn-success favicon-select-btn" >pilih</span>

                        </div>
                        <div class="well well-lg foto-produk-preview-area"  data-area='favicon'></div>
	          					</div>	          					

	          					<div class="form-group">
	          						<label for="logo-web">Logo</label>
	          						<div class="input-group">
	          						<input type="text" class="form-control" id="logo-web" value="<?php echo $data['logo']; ?>" />
	          						<span class="input-group-addon btn btn-success logo-select-btn" >pilih</span>
                      </div>
                      <div class="well well-lg foto-produk-preview-area"  data-area='logo-web'></div>
	          				</div>


                      <div class="form-group">
                        <label for="featured-image">Featured Image</label>
                        <div class="input-group">
                        <input type="text" class="form-control" id="featured-image" value="<?php echo $data['featured_image']; ?>" />
                        <span class="input-group-addon btn btn-success featured-image-btn" >pilih</span>
                      </div>
                      <div class="well well-lg foto-produk-preview-area"  data-area='featured-image'></div>
                    </div>


                      <div class="form-group">
                        <label for="width-thum-art">Width Thumbnail Artikel</label>
                        <input type="number" min="100" id="width-thum-art" class="form-control" value="<?php echo $data['width_thumb_artikel'] ?>" />
                      </div>

                      <div class="form-group">
                        <label for="width-thum-gal">Width Thumbnail Galeri</label>
                        <input type="number" min="100" id="width-thum-gal" class="form-control" value="<?php echo $data['width_thumb_galeri'] ?>" />
                      </div>

                      <div class="form-group">
                        <label for="width-thum-pro">Width Thumbnail Produk</label>
                        <input type="number" min="100" id="width-thum-pro" class="form-control" value="<?php echo $data['width_thumb_produk'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_populer_artikel">Populer Artikel</label>
                        <input  type="number" min="1" class="form-control" id="max_populer_artikel" value="<?php echo $data['max_populer_artikel'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_headline_artikel">Jumlah Headline Artikel</label>
                        <input  type="number" min="1" class="form-control" id="max_headline_artikel" value="<?php echo $data['max_headline_artikel'] ?>" />
                      </div>
                     


                      <div class="form-group">
                        <label for="max_tampil_artikel">Artikel Per halaman</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_artikel" value="<?php echo $data['max_tampil_artikel'] ?>" />
                      </div>
                    

                      <div class="form-group">
                        <label for="max_headline_galeri">Jumlah Headline Galeri</label>
                        <input  type="number" min="1" class="form-control" id="max_headline_galeri" value="<?php echo $data['max_headline_galeri'] ?>" />
                      </div>
                     

                      <div class="form-group">
                        <label for="max_tampil_galeri">Galeri per halaman</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_galeri" value="<?php echo $data['max_tampil_galeri'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_headline_produk">Jumlah headline produk</label>
                        <input  type="number" min="1" class="form-control" id="max_headline_produk" value="<?php echo $data['max_headline_produk'] ?>" />
                      </div>

                      <div class="form-group">
                        <label for="max_tampil_produk">Jumlah headline produk</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_produk" value="<?php echo $data['max_tampil_produk'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_tampil_agenda">Jumlah Agenda perhalaman</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_agenda" value="<?php echo $data['max_tampil_agenda'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_tampil_agenda_umum">Jumlah Agenda Umum</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_agenda_umum" value="<?php echo $data['max_tampil_agenda_umum'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_tampil_download">Jumlah download perhalaman</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_download" value="<?php echo $data['max_tampil_download'] ?>" />
                      </div>


                      <div class="form-group">
                        <label for="max_tampil_download_umum">Jumlah download umum</label>
                        <input  type="number" min="1" class="form-control" id="max_tampil_download_umum" value="<?php echo $data['max_tampil_download_umum'] ?>" />
                      </div>



          			  </div>
          			</div>

          		</div>


                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="head2">
                    <h4 class="panel-title">
                      <a href="#collapse2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse2">
                        Publik
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head2">
                    <div class="panel-body">

                    <div class="form-group">
                      <label for="disclaimer">Disclaimer</label>
                      <textarea class="form-control" id="disclaimer"><?php echo $data['disclaimer']; ?></textarea>
                    </div>



                    <div class="form-group">
                      <label for="termcondition">Term & Condition</label>
                      <textarea class="form-control" id="termcondition"><?php echo $data['termcondition']; ?></textarea>
                    </div>

                     <div class="form-group">
                      <label for="privacy">Privacy</label>
                      <textarea class="form-control" id="privacy"><?php echo $data['webprivacy']; ?></textarea>
                    </div>


                    </div>
                  </div>
                </div>



          			<div class="panel panel-danger">
          				<div class="panel-heading" role="tab" id="head2">
          					<h4 class="panel-title">
          						<a href="#collapse4" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse2">
          							Default Meta Tag
          						</a>
          					</h4>
          				</div>
          				<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head2">
	          				<div class="panel-body">

	          					<div class="form-group">
                        <label for="meta-description">Meta description</label>
                        <textarea class="form-control" id="meta-description"><?php echo $data['meta_deskripsi']; ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="meta-keyword">Meta Keyword</label>
                        <input type="text" class="form-control" id="meta-keyword" value="<?php echo $data['meta_keyword']; ?>" />
                      </div>

                       <div class="form-group">
                        <label for="thumbnail_sm">Thumbnail Sosial Media</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="thumbnail_sm" value="<?php echo $data['thumbnail_media']; ?>" />
                          <span class="input-group-addon btn btn-success thumbnail-sm-btn">Pilih</span>
                        </div>
                        <div class="well well-lg foto-produk-preview-area"  data-area='thumbnail_sm'></div>
                      </div>

	          				</div>
          			  </div>
          			</div>


          			<div class="panel panel-warning">
          				<div class="panel-heading" role="tab" id="head3">
          					<h4 class="panel-title">
          						<a href="#collapse3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapse3">
          							Custom CSS
          						</a>
          					</h4>
          				</div>
          				<div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="head3">
	          				<div class="panel-body">
	          					 <textarea class="form-control" style="height: 400px" id="custom-css"><?php echo $data['custom_css']; ?></textarea>
	          				</div>
          			  </div>
          			</div>
          		









          	</div>

            <button class="btn btn-sm btn-primary" id="simpan-infromasi">Simpan</button>

          </div>
         </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





