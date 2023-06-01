<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $key = $_SESSION['Vkey'];
    
    $Vid = $key;
    
    $dnid = $_POST["dnid"];

    $sql = "UPDATE `vassign_tb` SET `Received`='Discard' WHERE `Dnid`= '$dnid'";
    $conn->query($sql);




?>