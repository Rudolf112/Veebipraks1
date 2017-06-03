<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>IP logger</title>
</head>
<body>
    
    <?php
    
    if (file_exists('ips.txt')){
            //$myfile = fopen("ips.txt", "r") or die("Unable to open file!");
            //https://stackoverflow.com/questions/2059740/output-text-file-with-line-breaks-in-php
            $fh = fopen("ips.txt", 'r');
            $pageText = fread($fh, 25000);
            echo "Kõik lehel käinud IP'd: ". nl2br($pageText);
            $massiiv = file("ips.txt");
            $lines = count($massiiv);
            echo "KOKKU: ". $lines;
            fclose($fh);}
    
    else{echo "Oled esimene külaline! Refreshi...";}
    
    $fp = fopen("ips.txt" , "a+");
    fwrite($fp , $_SERVER['REMOTE_ADDR'] . "\r\n");
    fclose($fp);
    
    ?>   
    
</body>
</html>