<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Yl 7.3</title>
</head>
<body>
<?php $kassid= array( 
		array('nimi'=>'Miisu', 'vanus'=>2, 'pikkus'=> 30, 'kaal'=> 500), 
		array('nimi'=>'Tom', 'vanus'=>1, 'pikkus'=> 20, 'kaal'=> 400)
	);
foreach ($kassid as $kass) {
    include 'kuvamine.html';
}
?>
</body>
</html>