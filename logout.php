<?php
session_start();
if(session_destroy()) // Destroying All Sessions 
{
header("Location: homePage.php"); // Redirecting To Home Page
}
?>