<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $key = $_SESSION['Vkey'];
    
    $Vid = $key;
                   
    // define variables and set to empty values
    $dnid = $visibility = $odour= $texture = $taste = "";

    $dnid = $_POST["dnid"];
    $visibility = $_POST["visibility"];
    $odour = $_POST["odour"];
    $texture = $_POST["texture"];
    $taste = $_POST["taste"];


    $sql = "INSERT INTO validate_tb 
    (`Dnid`,`Visibility`, `Odour`, `Texture`,`Taste`)
    VALUES ('$dnid','$visibility', '$odour', '$texture','$taste')";
    $conn->query($sql);




?>