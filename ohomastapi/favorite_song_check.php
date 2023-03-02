<?php  
include("apiconfig.php");

$userID = $_GET['userID'];
$audioID = $_GET['audioID'];

$sql ="SELECT * FROM favorite_song  WHERE audio_id ='$audioID' AND user_id ='$userID'  ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success");
}

echo json_encode($response);
?>