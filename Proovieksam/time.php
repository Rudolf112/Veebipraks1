<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Time</title>
</head>
<body>
<?php

    date_default_timezone_set('Europe/Tallinn'); // CDT
    $current_date = date('H:i:s');
    echo "Serveri kell on: " . $current_date;
    
?>

<script>
//https://stackoverflow.com/questions/2705067/how-can-i-get-the-users-local-time-instead-of-the-servers-time
var currentTime = new Date();
var hours = currentTime.getHours();
var minutes = currentTime.getMinutes();
var seconds = currentTime.getSeconds();

if (minutes < 10) {
    minutes = "0" + minutes;
}

if (seconds < 10) {
    seconds = "0" + seconds;
}

document.write("Kasutaja kellaaeg on <b>" + hours + ":" + minutes + ":" + seconds +"</b>");
</script>
    
</body>
</html>