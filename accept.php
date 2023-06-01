<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $key = $_SESSION['Vkey'];
    
    // define variables and set to empty values
    $dnid = $fname = $lname= $phone = $address = $address2 = $town = $city = $state =$pincode = $dtype = $weight = "";


    $Vid = $key;
    $dnid = $_POST["dnid"];
    $tass = "Accepted";
    $rec = "-";
    $don = "-";
    $sql = "UPDATE `vassign_tb` SET `Vid`='$Vid',`Task Assigned`='$tass',`Received`='$rec',`Donated`='$don' WHERE `Dnid`='$dnid'";
    $conn->query($sql);

    $sql1 = "DELETE FROM `donation_tb` WHERE `Dnid`= '$dnid'";
    $conn->query($sql1);


?>