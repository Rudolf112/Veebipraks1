<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Eksamiyl</title>
</head>
<body>
    <div>
        <table>
        <form action="lisa.php" method="POST" enctype="multipart/form-data" name="markmed">
            <tr><td>Sinu märge:</td><td><textarea name="marge" rows="2" cols="30"></textarea></td></tr>
            <tr><td><input type="submit" value="Tee märge" /></td></tr>
        </form>
        </table>
    </div>
    <br/>
    <div>
    
    <table border="solid">
    <th>Märkme ID</th><th>Märge</th>
    <?php 
    //http://enos.itcollege.ee/~ttanav/VRI/Kodused/12/ylesanne.html
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
        
    $query = "SELECT * FROM rpurge_markmed";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    
    while($row = mysqli_fetch_row($result))
    {
    echo "<tr>";
    echo "<td>"."$row[0]</td>";
    echo "<td>"."$row[1]</td></tr>";
    }
    ?>   
    </table>
    </div>
    <br/>
    <table>
    <form action="muuda.php" method="POST" enctype="multipart/form-data" name="muuda">
            <tr><td>Muudetava märkme ID: </td><td><input type="number" name="id"></td></tr>
            <tr><td>Sinu uus märge:</td><td><textarea name="uusmarge" rows="2" cols="30"></textarea></td></tr>
            <tr><td><input type="submit" value="Muuda märget" /></td></tr>
        </form>
    </table>
    <br/>
    <table>
    <form action="kustuta.php" method="POST" enctype="multipart/form-data" name="muuda">
            <tr><td>Kustutatava märkme ID: </td><td><input type="number" name="id"></td></tr>
            <tr><td><input type="submit" value="KUSTUTA MÄRGE" /></td></tr>
        </form>
    </table>
</body>
</html>