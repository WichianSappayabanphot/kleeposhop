<?php
session_start();
if (!isset($_SESSION["userDetail_id"]))
{
    header("Location: login.php");
}
?>