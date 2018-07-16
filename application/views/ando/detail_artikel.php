<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


	<div class='col-md-12' id="header-page">
			<h2 style='font-size: 25px;'><span >Artikel</span></h2>
	</div>


<div class='col-md-8 left-side'>

<div itemscope itemtype="http://schema.org/NewsArticle" class='artikel' style="margin-bottom: 10px;">

	<meta itemscope itemprop="mainEntityOfPage" itemid="<?php echo current_url(); ?>" >

	<div class='konten'>
		<?php 

			echo "<h1 itemprop='headline' class='judul'>$artikel[judul]</h1>";

			 ?>

		<div class='info'>
			<meta itemprop="dateModified" content="<?php 

			if($artikel['tanggal_edit']=='0000-00-00 00:00:00'){
				echo cuma_tanggal($artikel['tanggal']);
			} else {
				echo cuma_tanggal($artikel['tanggal_edit']);

			}

			 ?>"/>
			<?php 


			echo "<span  itemprop='datePublished' content='".cuma_tanggal($artikel['tanggal'])."' class='tanggal'> <i class='fa fa-calendar'></i>&nbsp; ".format_tanggal($artikel['tanggal'])."</span>  

			<i class='fa fa-user'></i>&nbsp; 

			<span itemprop='author' itemscope itemtype='http://schema.org/Person'>
			<span  itemprop='name' class='author'> $artikel[nama_admin]</span> 
			</span>

			<span class='dibaca'> <i class='fa fa-eye'></i>&nbsp; Dibaca $artikel[dibaca] kali </span>";


				foreach (ambil_tag($artikel['tags']) as  $tag) {
					 echo "<span class=''><a href='".tag_url($tag['id_tag'],$tag['slug_tag'])."' style='color:#000;'><i class='fa fa-tags'></i> $tag[nama_tag]</a></span>";
				}

			 ?>
		</div>
		</div>

<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject" ><img  class="img-responsive" src="<?php echo img_artikel_url($artikel['foto']); ?>" />

<meta itemprop="url" content="<?php echo img_artikel_url($artikel['foto']); ?>">
<meta itemprop="width" content="1000">
<meta itemprop="height" content="600">

</span>

 <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
      <meta itemprop="url" content="http://www.sandro.id/an-component/media/upload-gambar-pendukung/sandro-id-logo.jpg">
      <meta itemprop="width" content="286">
      <meta itemprop="height" content="82">
    </div>
    <meta itemprop="name" content="SANDRO ID">
  </div>


	<div class='konten'>



		<div  itemprop="articleBody" class="isi">

			<?php 
			echo set_tag(reversequote($artikel['isi'],'all'));
			 ?>

		</div>

		<div id="share" style="margin:50px 0 50px 0;"></div>


		<div class="related_artikel" style="width: 100%; height: auto">
			<h4>Baca Juga</h4>
				<ul itemscope itemtype="http://schema.org/WebPage">
			<?php 

			foreach ($artikel_related_per_kategori as $related) {
				echo "<li><a itemprop='relatedLink' title='$related[judul]' href='".artikel_url($related['id'],$related['slug'])."' >$related[judul]</a></li>";
			}

			 ?>
				</ul>
		</div>

	</div>

</div>


 <div  class='komentar'>

<div id="disqus_thread"></div>
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/

var disqus_config = function () {
this.page.url = "<?php echo current_url() ?>"; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "<?php echo $informasi['uniqueid'] ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//<?php echo $disqus["unique_name"] ?>.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

 </div>


</div>