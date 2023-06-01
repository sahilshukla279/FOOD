<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM donor_tb";
    $result = $conn->query($sql); 
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $id = $_GET['idvalue'];
    
    foreach ($rows as $row) 
    {
        if($id == $row['Did'])
        {
            
            $fname = $row['First Name'];
            $lname = $row['Last Name'];
            $email = $row['Email'];
            $phone = $row['Phone Number'];


            echo $fname . "," . $lname . "," . $email . "," . $phone;

        }
    
    }



    



?>