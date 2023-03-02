<?php 
// $allowed_domain = 'example.com';

// if ($_SERVER['HTTP_HOST'] != $allowed_domain) {
//     // header('Location: http://www.example.com/404.html');

//     exit;
// }

$servername = "localhost";
$username = "root";
$password ="";
$db ="mastimusic";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_errno !=0){
    die("connection failed ".$conn->connect_errno);
}

?>