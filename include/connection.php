<?php

// 1. Create a database connection
$host = "localhost";
$username = "root";
$database = "food";
$password = "@gpitg20ehms;/";
$conn= mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    die("Database connection failed to connect" .mysqli_connect_error($conn));
}

// 2. Select a database to use  
$database_select = mysqli_select_db($conn,$database);
if (!$database_select) {
    die("Database selection failed: " .mysqli_error($conn));
}
?>