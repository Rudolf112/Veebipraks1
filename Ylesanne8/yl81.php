<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Yl8_1</title>
</head>
<body>
    <?php 
        $bg_col="#fff"; // vaikimisi valge
        $text_col="#000000"; // vaikimisi must
        $tekst="defaulttekst";
        if (isset($_POST['varv']) && $_POST['varv']!="") {
        $bg_col=htmlspecialchars($_POST['varv']);}
        if (isset($_POST['varv2']) && $_POST['varv2']!="") {
        $text_col=htmlspecialchars($_POST['varv2']);}
        if (isset($_POST['tekst']) && $_POST['tekst']!="") {
        $tekst=htmlspecialchars($_POST['tekst']);}
    ?>
    <form action="yl81.php" method="POST">
        <table>
            <tr><td>input text:</td><td><input type="text" name="tekst"></td></tr>
            <tr><td>taustavärv:</td><td><input type="color" name="varv"></td></tr>
            <tr><td>teksti värv:</td><td><input type="color" name="varv2"></td></tr>
        </table>
        <input type="submit" value="Esita">
    </form>
<div style="background:<?php echo $bg_col; ?>;color:<?php echo $text_col; ?>;"><?php echo $tekst; ?></div>
</body>
</html>