<?php
    //http://enos.itcollege.ee/~ttanav/VRI/Kodused/12/ylesanne.html
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

    $kommentaar = "";

    $marge = mysqli_real_escape_string($connection, htmlspecialchars($_POST["marge"]));

    $query = "INSERT INTO rpurge_markmed (Marge) VALUES ('$marge')";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    header("Location: index.php");

?>