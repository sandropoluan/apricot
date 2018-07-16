<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


	<div class='col-md-12' id="header-page">
			<h1><span><?php echo $heading; ?></span></h1>
	</div>




<div class='col-md-8 left-side'>

<?php foreach ($semua_artikel as $key => $artikel) {

echo "<div class='artikel'>";




echo "<img  class='img-responsive' src='".img_artikel_url($artikel['foto'])."' alt='$artikel[judul]' />";

echo "<div class='konten'>";
echo "<a href='".artikel_url($artikel['id'],$artikel['slug'])."'><h2 class='judul'>$artikel[judul]</h2></a>";

echo "<div class='info'>";
echo "<span class='tanggal'> <i class='fa fa-calendar'></i>&nbsp; ".format_tanggal($artikel['tanggal'])."</span> <span class='author'> <i class='fa fa-user'></i>&nbsp; $artikel[nama_admin]</span> <span class='dibaca'> <i class='fa fa-eye'></i>&nbsp; Dibaca $artikel[dibaca] kali </span>";

foreach (ambil_tag($artikel['tags']) as  $tag) {
	 echo "<span class=''><a href='".tag_url($tag['id_tag'],$tag['slug_tag'])."' style='color:#000;'><i class='fa fa-tags'></i> $tag[nama_tag]</a></span>";
}
echo "</div>";

echo "<div class='isi'>";
echo strip_tags(word_limiter(reversequote($artikel['isi'],'all'),100));
echo "</div>";

echo "<div class='social'>";

echo "<a href='' target='_blank'><div class='share-facebook share'></div></a>";
echo "<a href='' target='_blank'><div class='share-twitter share'></div></a>";
echo "<a href='' target='_blank'><div class='share-instagram share'></div></a>";

echo "<a href='".artikel_url($artikel['id'],$artikel['slug'])."' class='btn btn-border btn-info btn-effect'>Baca</a>";
echo "</div>";

echo "</div>";


echo "</div>";


} ?>

<div style='width:100%;text-align: center'>
  <?php echo $pagination; ?>

</div>
	




</div>
