<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <div class="content-wrapper" style='min-height: 800px' >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Distribusi Tema
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li class="active"> Distribusi Tema</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
   <div class="row">

       <div class="col-md-6">
          <div class='box box-warning'>
          		<div class='box-header'> 
                <h4>Distribusi</h4>
          		</div>
          		<div class='box-body'>



          					<div class="form-group">
          						<label>Pilih tema anda yang akan didistribusikan <br/>
          						<code><small>jangan redistribusikan tema orang lain</small></code>
          						</label>
          						<select id="tema" class="form-control">
          							<option value='0'>--pilih tema--</option>
          							<?php 

          								foreach ($temas as $tema) {
          									
          									echo "<option value='$tema[id]'>$tema[nama_tema]</option>";

          								}
          							 ?>
          						</select>
          					</div>

          					<div class="form-group">
          						<label>Versi</label>
          						<input type="number" class="form-control versi" value='1.0' min="1"  />
          					</div>

                    <div class="form-group">
                      <label>Nama Pembuat</label>
                      <input type="text" class="form-control author-tema"  />
                    </div>

                    <div class="form-group">
                      <label>Website</label>
                      <input type="text" class="form-control author-web"  />
                    </div>

                    <div class="form-group">
                      <label>Screenshot <code><small>(jpg/png) 750 x 500px</small></code></label>
                      <input type="file" class="form-control gambar"  />
                    </div>



          					<div class="form-group" >
          						<button class='btn btn-sm btn-info distribusikan'>Distribusikan</button>
          					</div>

                    <div class="form-group" >
                      <a href="#" class="pull-right zip-link" style="display:none"><button class="btn btn-danger">Berhasil! Download Zip <i class="fa fa-download"></i></button></a>
                    </div>


          			
          		</div>
          </div>
    </div>

       <div class="col-md-6">
          <div class='box box-info'>
              <div class='box-header'> 
                <h4>Buat Tema baru</h4>
              </div>
              <div class='box-body'>

                <div class="form-group">
                  <label>Nama Tema <br><code><small>buatlah seunik mungkin</small></code></label>
                  <input type="text" class="form-control nama_tema_baru" placeholder='di ijinkan hyphen,underscore,angka,huruf. contoh: john-tema-23' />
                </div>

                <div class="form-group">
                  <button class="btn btn-primary tombol-tema-baru">Buat Tema</button>
                </div>

                <div class="form-group pemberitahuan">

                </div>

                  
              </div>
          </div>
    </div>

  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
