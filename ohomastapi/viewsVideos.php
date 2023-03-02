<?php  
include("apiconfig.php");

$sql ="SELECT *  FROM videos  JOIN users ON videos.uid=users.uid JOIN audio ON videos.aid=audio.aid WHERE videos.status='1' ORDER BY videos.views DESC ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>