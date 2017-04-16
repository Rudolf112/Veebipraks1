<?php require_once('head.html');?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
		<?php
			$pildid = array("nameless1.jpg","nameless2.jpg","nameless3.jpg","nameless4.jpg","nameless5.jpg","nameless6.jpg",);
			foreach ($pildid as $key => $value) {
    			echo '<img src="pildid/'.$value.'" alt="nimetu '.$key.'" />';
		}
	?>
	</div>
</div>
<?php require_once('foot.html');?>