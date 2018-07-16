<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class='col-md-12' id="header-page">
			<h1><span>Frequently Asked Questions</span></h1>
	</div>

		<div class='col-md-8 left-side'>

			<div class="artikel">
				<div class="konten">
		   		<ul class="list-group">
						<?php
						
						foreach($faq as $f){
								echo "<li class='list-group-item'>
								<a href='".faq_url($f['id'],$f['slug'])."' style='color:rgba(0,0,0,0.7);font-weight:bold'>
								  <i class='fa fa-question-circle' style='font-size:18px;margin-right:10px'></i>
									$f[pertanyaan]
									</a>
								</li>";
						}
						
						?>
					</ul>
				</div>
			</div>

		</div>