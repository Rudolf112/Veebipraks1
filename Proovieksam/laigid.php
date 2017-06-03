<!DOCTYPE html>
<html>
<body>

<form action="laigid.php" method="post">
    <input type="submit" value="LIKE" name="submit">
</form>
    
    <?php
    
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
        
    $query = "SELECT * FROM rpurge_laigid";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    $row = mysqli_fetch_row($result);
    
    if (isset($_POST['submit'])){
    $row[0]++;
    
    $query = "UPDATE rpurge_laigid SET laigid='$row[0]'";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    }
    
    echo "LIKE nuppu on vajutatud ".$row[0]." korda!";
    ?>

</body>
</html>