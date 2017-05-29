<?php
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

    $id = "";
    $uusnait = "";
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $uusnait = mysqli_real_escape_string($connection, $_POST["uusnait"]);
    $query ="UPDATE rpurge_autod SET Next_yv='$uusnait' WHERE ID='$id'";
    mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    header("Location: vaata.php");
?>