<?php require_once('head.html');?>
<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=tulemus" method="POST">
		<?php
        $pildid = array("nameless1.jpg","nameless2.jpg","nameless3.jpg","nameless4.jpg","nameless5.jpg","nameless6.jpg",);
            foreach ($pildid as $key => $value) {
                echo '<p>
			    <label for="p'.$key.'">
				    <img src="pildid/'.$value.'" alt="nimetu '.$key.'" height="100" />
			    </label>
			    <input type="radio" value="'.$key.'" id="p'.$key.'" name="pilt"/>
		        </p>';
            }
        ?>
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>
<?php require_once('foot.html');?>