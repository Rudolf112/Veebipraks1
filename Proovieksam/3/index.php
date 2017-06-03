<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Külastajate loendur</title>
</head>
<body>
    
    <?php
    //http://www.developingwebs.net/phpclass/hitcounter.php
    if (file_exists('counter.txt')){
            $myfile = fopen("counter.txt", "r") or die("Unable to open file!");
            echo "Counter.txt sisu: ".fread($myfile,filesize("counter.txt"));
            fclose($myfile);}
    
    $count_my_page = ("counter.txt");
    $hits = file($count_my_page);
    $hits[0]=$hits[0]+1;
    $fp = fopen($count_my_page , "w");
    fputs($fp , "$hits[0]\r\n".date("h:i:sa"));
    fclose($fp);
    
    ?>   
    
</body>
</html>