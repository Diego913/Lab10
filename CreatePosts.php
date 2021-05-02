<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "diegogarcia", "beph7Lah", "diegogarcia");

$username = $_POST["username"];
$post = $_POST["post"];

if($mysqli->connect_errno) 
{
    printf("Connect Failed: %s\n", $mysqli->connect_error);
    exit();
}

$check_user = "SELECT * FROM Users WHERE  user_id = '" . $mysqli->real_escape_string($username) . "'";
$new_post = "INSERT INTO Posts (content, author_id) VALUES ('" . $mysqli->real_escape_string($post) . "', '" . $mysqli->real_escape_string($username) . "')";
$result = $mysqli->query($check_user);

if(mysqli_num_rows($result) > 0)
{
    if($mysqli->query($new_post) === TRUE)
    {
        echo "New post created successfully";
    } 
    else 
    {
        echo "Error: " . $new_post . "<br>" . $mysqli->error;
    }
} 
else 
{
    echo "Error: " . $username . " Does Not Exist!";
}

$result->free();
$mysqli->close();
?>