<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo ($modul=='edit')?"Edit Artikel":"Artikel Baru" ?> 
			<small><?php echo ($modul=='edit')?"Edit artikel anda":"Masukan artikel baru" ?></small></h1>
			<ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active"><?php echo ($modul=='edit')?"Edit Artikel":"Artikel Baru" ?></li>
           
          </ol>
	</section>

	<section class="content">
		<div class="box box-warning">
		<div class="box-body">
				<div class="row">
					<div class="col-md-12 col-xs-12">

						<div class="form-group">
							<label for="judul_artikel">Judul Artikel</label>
							<input type="text" class="form-control" name="judul_artikel" id="judul_artikel" value='<?php echo $artikel_judul ?>' >
						</div>

						<div class='form-group'>
          					<label for='seo_url'>SEO URL</label>
	          					<div class="input-group">
	          						<div class="input-group-addon"><?php echo base_url() ?>artikel/00-</div>
			          				 <input type='text' class='form-control' name='seo_url' id='seo_url' placeholder='field ini akan otomatis terisi ketika anda mengetikan judul artikel. Tentu saja anda dapat mengeditnya' value='<?php echo $artikel_seo_url  ?>' >
			          				
		          				</div>
          				</div>

						<div class="form-group">
							<label for="isi_artikel">Isi Artikel</label>
							<textarea  id='isi_artikel' class='isi_artikel form-control'><?php echo $artikel_isi ?></textarea>
						</div>

						<div class="form-group">
                   		 <input type='hidden' class='sesi-from_artikel' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
                   		 <input type='hidden' class='id_artikel' value='<?php echo $artikel_id ?>' >
						</div>

						<div class="form-group">
							<label for="kategori_artikel">Kategori</label>
							<select name="kategori_artikel" id="kategori_artikel" class="form-control">
								<option value="0" selected>Pilih kategori</option>
								<?php
								if($list_kategori!=false){
									echo $list_kategori;
								}
								 ?>
							</select>
						</div>

						<div class="form-group">
							<label for="">Tags</label> <small>terpilih <span class="area_count">0</span> tag(s)</small>
							<div class="well well-sm well-tag">
								<?php
								if($tag_kategori!=false){
									echo $tag_kategori;
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label>Foto Gallery</label> <small>foto boleh banyak</small>
							<div class="dropzone well well-sm foto_gallery_artikel">
							</div>
						</div>

						<div class="form-group" style="height:30px">
							<button class='btn btn-sm btn-danger tbl-hapus-multi'><i class='glyphicon glyphicon-trash'></i>  Hapus Foto Terpilih </button>
						 </div>

						<div class="form-group"><div class="row foto-artikel-area"><?php 
						if($artikel_photos!=false){
							foreach ($artikel_photos as  $value) {
								$featured=($value["featured"]=="Y")?"<span class='label label-primary featured-label'>Featured</span>":"";
								$ftrue=($value["featured"]=="Y")?"featured-true":"";
								echo "
								<div class='aPhotoThumb col-md-4 col-xs-4 $ftrue'>
								$featured
								<span class='label label-danger hapus_label'> menghapus... </span>
								<button class='btn btn-warning btn-sm featured-tombol'>jadikan featured image</button>
								<span class='glyphicon glyphicon-remove hapus_foto_artikel' id='$value[id_foto]'></span>
								
								<div class='hover_foto_artikel' ></div>";
								echo "<img src='$path_art_photo_thumb/$value[nama_foto]'>";
								echo "</div>";
							}
						}
						?></div></div>

						<div class="form-group"> 
							<button class='btn btn-xs btn-success tampilkan-meta' alt='0'>Tampilkan Informasi Tambahan</button>
						</div>

						<div class="tambahan_p_artikel" style="display: none;">	

						<div class="form-group">
							<label>Jadikan Headline</label>
							<div class="cek_headline">YES</div>
						</div>

						<?php
						if($artikel_id_user==false OR $artikel_id_user==$id_user OR $user_level==1){
						echo '<div class="form-group">
							<label>Izinkan User lain Untuk Mengedit Artikel</label>
							<div class="iz_edit">YES</div>
						</div>';
						}
						?>

						<div class="form-group">
							<label for="meta_description">Meta Description</label>
							<input type="text" class="form-control" id="meta_description" placeholder="optional. jika anda kosongkan, meta ini tidak akan tampil di website anda" value="<?php echo $artikel_meta_description; ?>">
						</div>
						<div class="form-group">
							<label for="meta_author">Meta author</label>
							<input type="text" class="form-control" id="meta_author" placeholder="optional. jika anda kosongkan, meta ini tidak akan tampil di website anda" value="<?php echo $artikel_meta_author ?>">
						</div>

						<div class="form-group">							
							<label for="meta_keyword">Meta Keyword</label>
							<input type="text" class="form-control" id="meta_keyword" placeholder="optional. pisahkan dengan koma. jika anda kosongkan, meta ini tidak akan tampil di website anda"  value="<?php echo $artikel_meta_keyword ?>">
						</div>
						<br>
						<br>

						<div class="form-group">
							<label for="og_title">Facebook OG Title</label>
							<input type="text" class="form-control" id="og_title" placeholder="optional" value="<?php echo $artikel_og_title ?>">
						</div>

						<div class="form-group">
							<label for="og_description">Facebook OG Description</label>
							<input type="text" class="form-control" id="og_description" placeholder="optional" value="<?php echo $artikel_og_description ?>" >
						</div>

						<div class="form-group">
							<label for="og_image">Facebook OG Image <small>(Harus awali dengan http:// atau https://) </small></label>
							 <div class="input-group">
							<input type="text" class="form-control" id="og_image" placeholder="optional. Masukan url gambar" value="<?php echo $artikel_og_image ?>"><span class="input-group-addon pilih-fb-url">Pilih</span>
							</div>
							<div class="well well-lg foto-produk-preview-area"  data-area='og_image'></div>
						</div>

						<div class="form-group"></div>

						
						</div>

						<div class="form-group">
							

							 <button class="btn btn-sm btn-primary save-artikel"><?php echo ($artikel_id==0 || $artikel_status=='draft')?'Publish':'Update' ?></button>
							
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

							<button class="btn btn-xs  draft-artikel"><?php echo ($artikel_status=='publish')?"kembalikan ke draft":"Save draft"?></button> <small class='time-draft'></small><small class='pesan-draft'></small> 

						</div>
					</div>
				</div>
			<div class="box-body">
			</div>
		</div>
		</div>


	</section>
</div>