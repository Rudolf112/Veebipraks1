<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
    if (isset($_SESSION["logged_in"])){
        header("Location: ?page=loomad");
    }
        if (isset($_POST['user']) && isset($_POST['pass'])){
        global $connection;
        $u = mysqli_real_escape_string($connection, $_POST["user"]);
        $p = mysqli_real_escape_string($connection, $_POST["pass"]);
        $query = "SELECT * FROM rudolf_kylastajad WHERE username = '$u' AND passw = SHA1('$p')";
        $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
        if (mysqli_num_rows($result)>0){
            $_SESSION["logged_in"] = TRUE;
            $_SESSION["user"] = $_POST["user"];
            $row = mysqli_fetch_array($result);
            $_SESSION['roll'] = $row['roll'];
            header("Location: ?page=loomad");
        }
        }
    include_once('views/login.html');
    }
function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
    global $connection;
    $puurid = array();
    $puurinr = array();
    $query = "SELECT DISTINCT puur FROM rudolf_loomaaed";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    
    while ($row = mysqli_fetch_assoc($result)){
        $puurid[$row['puur']] = $puurinr;
    }
    
    $query = "SELECT puur, liik, id FROM rudolf_loomaaed";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($puurid[$row['puur']], $row['liik']); //täidan eelmises tsüklis loodud array elemendid nimedega
    }
	include_once('views/puurid.html');	
}
// kasutatud https://github.com/madisvorklaev/vrakendused1/blob/master/loomaaed/funk.php

function lisa(){
	global $connection;
    $nimi = "";
    $puur = "";
    if ($_SESSION['roll'] == "user")
    {
        header("Location: ?page=loomad");
    }
    if (isset($_SESSION["logged_in"]) && isset($_POST["nimi"]) && isset($_POST["puur"])){
        $nimi = mysqli_real_escape_string($connection, $_POST["nimi"]);
        $puur = mysqli_real_escape_string($connection, $_POST["puur"]);
        $liik = "pildid/".htmlspecialchars($_FILES["liik"]["name"]);
        $liik = mysqli_real_escape_string($connection,$liik);
        $query2 = "INSERT INTO rudolf_loomaaed (nimi, puur, liik) VALUES ('$nimi', '$puur', '$liik')";
        $result2 = mysqli_query($connection, $query2) or die("$query2 - ".mysqli_error($connection));
        
        if (mysqli_insert_id($connection)>0 && !empty(upload($_FILES["liik"]["name"]))){
            header("Location: ?page=loomad");
        }
    }
        include_once('views/loomavorm.html');
}

function upload($name){
    $allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$tmp = explode('.', $_FILES[$name]["name"]);
    $extension = end($tmp);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>