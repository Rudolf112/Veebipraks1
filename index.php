<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Täiega vägev HTML leht</title>
<link rel="stylesheet" type="text/css" href="stiil.css">
</head>
<body>

<h1>Minu esimene HTML!</h1>
<p>Täiega vägev värk. Viimati sai HTML'i tehtud 100a tagasi.</p>
<p><?php

echo phpversion();

$host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";
$l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, "SET CHARACTER SET UTF8") or
            die("Error, ei saa andmebaasi charsetti seatud");
    mysqli_close($l);
?>

</p>
<img src="keep-calm-and-windows-rules-2.jpg" alt="W3Schools.com" width="104" height="142">

</body>
</html>