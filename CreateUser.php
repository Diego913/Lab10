<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "diegogarcia", "beph7Lah", "diegogarcia");

$username = $_POST["username"];

if($mysqli->connect_errno) 
{
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

$new_user = "INSERT INTO Users (user_id) VALUES ('" . $mysqli->real_escape_string($username) . "')";

if($mysqli->query($new_user) === TRUE)
{
    echo "New User Created Successfully!";
} 
else 
{
    echo "Error: " . $new_user . "<br>" . $mysqli->error;
}

$mysqli->close();
?>