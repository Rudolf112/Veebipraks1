<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Ülesanne 7.1</title>
</head>
<body>
    <?php 
    $a = "thisistherightway";
    echo $a."<br/>";
    for ($i=strlen($a)-1;$i>=0;$i--){
        echo $a[$i];
    }
    ?>
</body>
</html>