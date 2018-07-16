<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class='col-md-12' id="header-page">
			<h1><span>Semua Agenda</span></h1>
	</div>

		<div class='col-md-8 left-side'>

			<div class="artikel">
				<div class="konten">
					<ul>
            <?php
              foreach($agendas as $agenda){
                echo "<li><a href=".agenda_url($agenda['id'],$agenda['slug']).">$agenda[judul]</a></li>";
              }
            ?>
          </ul>					
				</div>
			</div>

		</div>