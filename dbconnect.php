<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}
$database = "plan_db";
$query = "CREATE DATABASE IF NOT EXISTS $database";
if (!mysqli_query($conn, $query)) {
    echo "Error creating the database";
}

?>