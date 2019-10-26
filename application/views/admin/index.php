
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
  </nav>

  <div class="container-fluid">
    <h1 class="mt-4">Admin panel</h1>
    <div class="row">
    <?php
    	if($gallery['status'] != 'null'){
	    	foreach ($gallery['path'] as $key => $value) {
	    		?>
	    		<div class="col-md-4">
	    			<label><?php echo $gallery['name'][$key];?></label><br>
	    			<img src="<?php echo base_url() . $value;?>" width="200"><br><br>
	    			<form action="<?=site_url('admin/update_name')?>" method="post">
	    				<input type="text" name="file_name">
	    				<input type="hidden" value="<?php echo $gallery['id'][$key];?>" name="id">
	    				<input type="submit" value="update caption">
	    			</form>
	    		</div>
	    		<?php 
	    	}
    	}
    ?>
	</div>
  </div>
</div>