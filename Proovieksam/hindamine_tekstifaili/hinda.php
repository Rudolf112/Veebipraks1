<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Lehe hindamine</title>
</head>
<body>
    <form action="hinda.php" id="vorm" method="POST">
    Hinne:
    <input type="submit" name="submit">
    </form>

<select name="hinne" form="vorm">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
    <option value="5">5</option>
</select>

<?php
    if(isset($_POST['submit'])){
        $fp = fopen("hinded.txt" , "a+");
        fwrite($fp , $_POST['hinne'] . "\r\n");
        fclose($fp);
    }
    
    if (file_exists('hinded.txt')){
            //https://stackoverflow.com/questions/2059740/output-text-file-with-line-breaks-in-php
            $fh = fopen("hinded.txt", 'r');
            $pageText = fread($fh, 25000);
            echo "Kõik hinded: ". nl2br($pageText);
            $massiiv = file("hinded.txt");
            $lines = count($massiiv);
            $average = array_sum($massiiv) / $lines;
            echo "KESKMINE: ". $average;
            fclose($fh);}
    
?>
</body>
</html>