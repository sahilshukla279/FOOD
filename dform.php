<?php

session_start();
if($_SESSION['Dkey'])
{
    header("Location: donor_form.php");
}
else
{
    header("Location: donor_login.php");
}

?>