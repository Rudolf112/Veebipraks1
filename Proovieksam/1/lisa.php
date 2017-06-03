<?php

    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

    $nimi = "";
    $kommentaar = "";

    $nimi = mysqli_real_escape_string($connection, htmlspecialchars($_POST["nimi"]));
    $kommentaar = mysqli_real_escape_string($connection, htmlspecialchars($_POST["kommentaar"]));

    $query = "INSERT INTO rpurge_kommentaarid (Nimi, Kommentaar) VALUES ('$nimi', '$kommentaar')";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    header("Location: index.php");

?>