<?php
    //http://enos.itcollege.ee/~ttanav/VRI/Kodused/12/ylesanne.html
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    
    $id = "";
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    
    $query1 = "DELETE FROM rpurge_markmed WHERE ID='$id'";
    $result = mysqli_query($connection, $query1) or die("$query1 - ".mysqli_error($connection));

    header("Location: index.php");
?>