<?php  
include("apiconfig.php");

$sql ="SELECT videos.vid,videos.vtitle,videos.videourl,videos.likes,videos.views,videos.description,videos.status,videos.date,videos.tags,users.uid,users.profile,audio.aid,audio.audio_url,promotion.start_time,promotion.end_time  FROM videos  JOIN users ON videos.uid=users.uid JOIN audio ON videos.aid=audio.aid JOIN promotion ON promotion.video_id=videos.vid WHERE promotion.status='1' ORDER BY promotion.id DESC ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>