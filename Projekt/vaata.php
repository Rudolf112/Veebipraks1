<!DOCTYPE html>
<html>
<head>
<style>
    body {background-color: linen;}
    table, th, td {
   border: 1px solid black;
    }
</style>
<title>Vaata autosid</title>
<meta charset="utf-8" />
</head>
<body>
    <p><a href="vorm.php">Lisa autosid</a></p>
    <?php
    global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    
    ?>
    <table>
    <tr><th>Mark</th><th>Regnr</th><th>kW</th><th>Odomeetri näit</th><th>Järgmine ülevaatus</th><th>Järgmine õlivahetus</th><th>Kütus</th><th>Süüteküünalde vahetus</th><th>Tahmafilter</th><th>Tahmafiltri hooldus</th></tr>
    
    <?php 
    
    $query = "SELECT * FROM rpurge_autod";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    
    while($row = mysqli_fetch_row($result))
    {
    echo "<tr>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
    echo "<td>$row[5]</td>";
    echo "<td>$row[6]</td>";
    echo "<td>$row[7]</td>";
        if ($row[8]!=0){
        echo "<td>$row[8]</td>";}
        else {echo "<td>-</td>";}
    if ($row[9]!=""){
        echo "<td>$row[9]</td>";}
        else {echo "<td>-</td>";}
    if ($row[10]!=0){
        echo "<td>$row[10]</td>";}
        else {echo "<td>-</td>";}
    echo "</tr>\n";
    }
    ?>
    
    </table>
</body>
</html>