<?php  
include("apiconfig.php");
$currentAUDIO = $_GET['caid'];

$sql ="SELECT *  FROM videos  JOIN users ON videos.uid=users.uid JOIN audio ON videos.aid=audio.aid WHERE videos.aid='$currentAUDIO' AND videos.status='1'  ORDER BY videos.vid DESC ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success" , "data"=>$row);
}


echo json_encode($response);
?>