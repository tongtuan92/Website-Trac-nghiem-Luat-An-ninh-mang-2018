
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
  	<?php 
  			for ($num=1; $num<=$total_page ; $num++) { 
  				?>
  				<a class="btn btn-primary" href="?page=<?php echo $num ?>"><?php echo $num ?></a>
  				<?php
  			}
  	 ?>
  </div>