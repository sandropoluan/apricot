<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class='col-md-12' id="header-page">
			<h1><span>Download file</span></h1>
	</div>

		<div class='col-md-8 left-side'>

			<div class="artikel">
				<div class="konten">
					<ul>
            <?php
              foreach($downloads as $download){
                echo "<li><a href=".download_url($download['id'],$download['slug']).">$download[file]</a></li>";
              }
            ?>
          </ul>					
				</div>
			</div>

		</div>