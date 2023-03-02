<?php  
// include("apiconfig.php");
$servername = "localhost";
$username = "root";
$password ="";
$db ="mastimusic";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_errno !=0){
    die("connection failed ".$conn->connect_errno);
}
$tempName= $_FILES['filename']['tmp_name'];
$videoName = uniqid() . ".mp3";

if (move_uploaded_file($_FILES["filename"]["tmp_name"], "videos/$videoName")) {
    echo json_encode(array( "status" => "true","message" => "Successfully file added!"));
}
echo json_encode(array( "status" => "false","message" => "Failed Song !") );
?>