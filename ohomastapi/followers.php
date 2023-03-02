<?php  
include("apiconfig.php");

// yes ma follower table bata sabai user nikalne jasko current user sanga milxa;
// yes ma ma jas lai follow gareko xu tyo data 
// cuid maa mero id jun jun id laii follow gareko xa tyo

$userId = $_GET['cuid'];
$sql ="SELECT users.uid,users.name,users.username,users.profile,users.bio,users.gid,users.gToken,users.status   FROM users  JOIN followers ON users.uid = followers.cuid WHERE followers.uid='$userId' AND users.status='1' ORDER BY users.uid DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>