<?php

session_start();
if($_SESSION['Vkey'])
{
    header("Location: volunteer.php");
}
else
{
    header("Location: volunteer_login.php");
}

?>