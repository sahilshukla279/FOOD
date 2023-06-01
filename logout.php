<?php

session_start();
unset($_SESSION['Dkey']);
unset($_SESSION['Vkey']);
unset($_SESSION['Akey']);
header("location: index.php");

?>