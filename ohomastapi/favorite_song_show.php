<?php  
include("apiconfig.php");

$userID = $_GET['userID'];

$sql ="SELECT * FROM audio JOIN favorite_song ON audio.aid = favorite_song.audio_id JOIN users ON audio.uid = users.uid WHERE favorite_song.user_id ='$userID' ORDER BY favorite_song.id DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success" , "data"=>$row);
}

echo json_encode($response);
?>