<?php
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "morphed_rage";

$conn = mysqli_connect($server, $username, $password, $database);
if ($conn){
}
 else{
    die("Error". mysqli_connect_error());
}
?>
