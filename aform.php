<?php

session_start();
if($_SESSION['Akey'])
{
    header("Location: admin.php");
}
else
{
    header("Location: admin_login.php");
}

?>