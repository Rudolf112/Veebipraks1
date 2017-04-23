<?php 
session_start();
if (!isset($_SESSION["voted_for"]) && isset($_POST["pilt"]))
    $_SESSION["voted_for"]=$_POST["pilt"];
$pildid = array("nameless1.jpg","nameless2.jpg","nameless3.jpg","nameless4.jpg","nameless5.jpg","nameless6.jpg",);
require_once('head.html');

if (isset($_GET['page']))
    switch ($_GET['page']){
    case 'galerii':
        include 'galerii.php';
        break;
    case 'vote':
            if (isset($_SESSION["voted_for"])){
                   $number = $_SESSION["voted_for"]+1;
                    echo 'Oled juba valinud pildi nr '.$number;
                ?><p><form action="endsession.php" method="POST"><input type="submit" value="Lõhu sessioon"></form></p><?php
                    break;
            }else{
            include 'vote.php';
            break;}
    case 'tulemus':
        include 'tulemus.php';
        break;
    default:
        include 'pealeht.php';
        break;
    }

if (!isset($_GET['page']))
    include 'pealeht.php';

require_once('foot.html');
?>