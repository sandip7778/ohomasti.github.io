<?php  
include("apiconfig.php");

$userId = $_GET['userid'];

$sql ="SELECT videos.vid,videos.vtitle,videos.videourl,videos.likes,videos.views,videos.description,videos.status,videos.date,users.uid,users.username,users.profile,audio.aid,audio.audio_url  FROM videos  INNER JOIN users ON videos.uid=users.uid JOIN audio ON videos.aid=audio.aid WHERE users.uid='$userId' AND videos.status = '1'  ORDER BY videos.vid DESC ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}else{
    $response =array("status"=>"success" , "data"=>$row);
}


echo json_encode($response);
?>