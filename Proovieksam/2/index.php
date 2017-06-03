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
    
    <?php 
        // https://www.w3schools.com/php/php_file_open.asp
        if (file_exists('kommentaarid.txt')){
            $myfile = fopen("kommentaarid.txt", "r") or die("Unable to open file!");
            echo fread($myfile,filesize("kommentaarid.txt"));
            fclose($myfile);}
    ?>   
    
    </div>
    
</body>
</html>