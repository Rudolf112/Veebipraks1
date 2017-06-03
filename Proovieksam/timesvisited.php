<html>
<head>
<meta charset="utf-8" />
<title>Cookie as counter</title>
</head>
<body>

<?php
    
    //https://stackoverflow.com/questions/7958930/cookie-page-counter-in-php
if(!isset($_COOKIE['count'])) {
    echo "Sa pole siin lehel varem käinud!";
    setcookie("count", 1);
} else {
    echo "Sa oled siin lehel käinud nii mitu korda: " . $_COOKIE['count'];
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie);
}
?>

</body>
</html>