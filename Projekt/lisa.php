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
    connect_db();
    global $connection;
    $mark = "";
    $regnr = "";
    $kw = "";
    $odo = "";
    $yv = "";
    $oil = "";
    $kytus = "";
    $sparks = "";
    $tahmafilter = "";
    $tfhooldus = "";
        
    $mark = mysqli_real_escape_string($connection, htmlspecialchars($_POST["mark"]));
    $regnr = mysqli_real_escape_string($connection, htmlspecialchars($_POST["regnr"]));
    $kw = mysqli_real_escape_string($connection, htmlspecialchars($_POST["kw"]));
    $odo = mysqli_real_escape_string($connection, htmlspecialchars($_POST["odo"]));
    $yv = mysqli_real_escape_string($connection, htmlspecialchars($_POST["yv"]));
    $oil = mysqli_real_escape_string($connection, htmlspecialchars($_POST["oil"]));
    $kytus = mysqli_real_escape_string($connection, htmlspecialchars($_POST["kytus"]));
    $sparks = mysqli_real_escape_string($connection, htmlspecialchars($_POST["sparks"]));
    $tahmafilter = mysqli_real_escape_string($connection, htmlspecialchars($_POST["tahmafilter"]));
    $tfhooldus = mysqli_real_escape_string($connection, htmlspecialchars($_POST["tfhooldus"]));

    if($kytus == "bensiin" && $tahmafilter == "jah"){
        $tahmafilter = "ei";
    }
    if($kytus == "bensiin" && $tfhooldus != ""){
        $tfhooldus = "";
    }
    if($kytus == "diisel" && $sparks != ""){
        $sparks = "";
    }
    
    $query = "INSERT INTO rpurge_autod (Mark, Regnr, kW, Odom, Next_yv, Next_oil, Kytus, Sparks, Tahmafilter, Tahmafiltri_hooldus) VALUES ('$mark', '$regnr', '$kw', '$odo', '$yv', '$oil', '$kytus', '$sparks', '$tahmafilter', '$tfhooldus')";
    $result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
    header("Location: vaata.php");
?>