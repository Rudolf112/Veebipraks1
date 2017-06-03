<?php

//https://www.w3schools.com/php/php_file_create.asp
$myfile = fopen("kommentaarid.txt", "a+") or die("Unable to open file!");
$txt = $_POST['nimi']." kommenteeris: ".$_POST['kommentaar']."<br/>";
fwrite($myfile, $txt);
fclose($myfile);

header("Location: index.php");

?>