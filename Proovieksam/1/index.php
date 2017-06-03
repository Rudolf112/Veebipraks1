<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Pealkiri</title>
</head>
<body>
    <div>
        <table>
        <form action="lisa.php" method="POST" enctype="multipart/form-data" name="kommentaarid">
            <tr><td>Sinu nimi:</td><td><input type="text" name="nimi" /></td></tr><br/>
            <tr><td>Sinu kommentaar:</td><td><textarea name="kommentaar" rows="2" cols="30"></textarea></td></tr>
            <tr><td><input type="submit" value="Kommenteeri" /></td></tr>
        </form>
        </table>
    </div>
    <br/>
    <div>
    
    <table>
    <?php 
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
        
    $query = "SELECT * FROM rpurge_kommentaarid";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    
    while($row = mysqli_fetch_row($result))
    {
    echo "<tr>";
    echo "<td>Kasutaja "."$row[1]</td>";
    echo "<td> kommenteeris: "."$row[2]</td>";
    }
    ?>   
    </table>
    </div>
    
</body>
</html>