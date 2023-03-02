<?php  
include("apiconfig.php");

$userId = $_GET['cuid'];
$sql ="SELECT users.uid,users.name,users.username,users.profile,users.bio,users.gid,users.gToken,users.status FROM users  JOIN followers ON users.uid = followers.uid WHERE followers.cuid='$userId'AND users.status='1' ORDER BY users.uid DESC";

$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>