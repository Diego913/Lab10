<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli("mysql.eecs.ku.edu", "diegogarcia", "beph7Lah", "diegogarcia");

if($mysqli->connect_errno) 
{
    printf("Connect Failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Users";

if($result = $mysqli->query($query)) 
{
    echo "<table>";

    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>" . $row["user_id"] . "</td></tr>"; 
    }
    echo "</table>";

    $result->free();
}

$mysqli->close();
?>