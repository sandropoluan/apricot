<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


	<div class='col-md-12' id="header-page">
			<h1><span><?php echo $heading; ?></span></h1>
	</div>



	<div class='col-md-8 left-side'>

		<div class="artikel">

			<?php if($page["foto"]!=""){
				echo "<img class='img-responsive' alt='$page[judul]' src='$page[foto]' />";
			} 
			?>

			
		 <div class='konten'>
			<div class="isi">
				<?php echo reversequote($page['isi'],'all'); ?>
			</div>

		 </div>
		</div>

	</div>