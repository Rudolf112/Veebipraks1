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
    
    $query1 = "SELECT Kytus FROM rpurge_autod WHERE ID='$id'";
    $result = mysqli_query($connection, $query1) or die("$query1 - ".mysqli_error($connection));
    $row = mysqli_fetch_row($result);
    if ($row[0] == "bensiin"){
    
    $uusnait = mysqli_real_escape_string($connection, $_POST["uusnait"]);
    $query ="UPDATE rpurge_autod SET Sparks='$uusnait' WHERE ID='$id'";
    mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    header("Location: vaata.php");
    }
?>
<script>
alert("Diiselautol ei saa muuta syytekyynlaid! Andmeid ei muudetud...")
window.location.href = "vaata.php"
</script>