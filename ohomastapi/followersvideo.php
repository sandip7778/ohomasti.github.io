<?php  
include("apiconfig.php");
$currentUID = $_GET['cuid'];

$sql ="SELECT videos.vid,videos.vtitle,videos.videourl,videos.likes,videos.views,videos.description,videos.status,videos.date,videos.tags,users.uid,users.profile,audio.aid,audio.audio_url  FROM videos  JOIN users ON videos.uid=users.uid JOIN audio ON videos.aid=audio.aid JOIN followers ON videos.uid=followers.uid WHERE followers.cuid='$currentUID' ORDER BY videos.vid DESC ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success" , "data"=>$row);
}


echo json_encode($response);
?>
