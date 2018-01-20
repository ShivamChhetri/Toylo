<?php

session_start();
// if(session_destroy()) // Destroying All Sessions
// {
session_destroy();
header("Location: ../main.php"); // Redirecting To Home Page
// }
?>