<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM volunteer_tb";
    $result = $conn->query($sql); 
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $id = $_GET['idvalue'];
    
    foreach ($rows as $row) 
    {
        if($id == $row['Vid'])
        {
            
            $fname = $row['First Name'];
            $lname = $row['Last Name'];
            $address1 = $row['Address 1'];
            $address2 = $row['Address 2'];
            $town = $row['Town'];
            $city = $row['City'];
            $state = $row['State'];
            $pincode = $row['Pincode'];
            $email = $row['Email'];
            $phone = $row['Phone Number'];


            echo $fname . "," . $lname . "," . $address1 . "," . $address2 . "," . $town . "," . $city . "," . $state . "," . $pincode . "," . $email . "," . $phone;

        }
    
    }



    



?>