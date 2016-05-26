<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class='col-md-12' id="header-page">
			<h1><span><?php echo $informasi['title'] ?></span></h1>
	</div>

		<div class='col-md-8 left-side'>

			
<?php 

foreach ($semua_galeri as $galeri) {
  echo "<div class='artikel'>";

  echo "<div class='konten'>";
  echo "<a href='".galeri_url($galeri['id'],$galeri['slug'])."'><h2 class='judul'>$galeri[nama]</h2></a>";
  echo "</div>";

  echo "<img class='img-responsive' src='".img_galeri_url($galeri['foto'])."' alt='$galeri[nama]' />";

  echo "<div class='konten'>";

	echo "<a class='' href='".galeri_url($galeri['id'],$galeri['slug'])."'><button style='float:none' class='btn btn-info btn-effect'>Lihat Galeri</button></a>";

	echo "</div>";

	echo "</div>";

}

 ?>					
					
		<div style='width:100%;text-align: center'>
		  <?php echo $pagination; ?>

		</div>

		</div>