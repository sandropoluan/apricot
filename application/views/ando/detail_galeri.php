<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class='col-md-12' id="header-page">
			<h2><span>Galeri</span></h2>
	</div>

		<div class='col-md-8 left-side'>

			<div class="artikel">
				<div class="konten">
					
					<h1 class='judul'><?php echo $galeri['nama']; ?></h1>

				</div>

				<div class="konten">
					<div class='grid'>
<?php 

foreach (ambil_foto_galeri($galeri['id']) as $foto) {

	echo "<div class='grid-item' style='margin:10px 10px 0 0'><a  href='".img_galeri_url($foto['nama_foto'])."' title='$foto[deskripsi_foto]'><img src='".img_galeri_url($foto['nama_foto'],true)."' alt='$foto[deskripsi_foto]' /></a></div>";

}

 ?>
					</div>
				</div>

				<div class="konten">

<?php 
		echo $galeri['deskripsi'];

 ?>

				</div>

			</div>

		</div>