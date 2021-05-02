<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$mysqli = new mysqli("mysql.eecs.ku.edu", "diegogarcia", "beph7Lah", "diegogarcia");

$posts = $_POST["posts"];

if($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(isset($posts) && is_array($posts)) 
{
    foreach($posts as $post) 
    {
        $query = "DELETE FROM Posts WHERE  post_id = '" . $mysqli->real_escape_string($post) . "'";
        
        if ($result = $mysqli->query($query)) 
        {
            echo "Deleted post {$post}"; 
            echo "<br>";
        } 
        else 
        {
            echo "Error: " . $result . "<br>" . $mysqli->error;
        }
    }
}
$mysqli->close();
?>