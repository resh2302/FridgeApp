<?php

session_start();

function checkSession()
{
    if ((!isset($_SESSION['userid'])) || ($_SESSION['userid'] == ''))
    {
        header("Location: index.php ");
    }
}

?>