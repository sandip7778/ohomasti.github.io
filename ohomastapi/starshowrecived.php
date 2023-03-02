<?php  
include("apiconfig.php");

$uid = $_GET['uid'];

$sql ="SELECT users.uid,users.username,users.profile,stars.sid,stars.stars,stars.date,videos.vid,videos.vtitle,videos.videourl FROM users JOIN stars ON users.uid = stars.cuid JOIN videos ON videos.vid = stars.vid WHERE stars.uid='$uid' ORDER BY  stars.date DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>