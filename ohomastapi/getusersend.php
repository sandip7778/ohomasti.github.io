<?php  
include("apiconfig.php");

// yes ma follower table bata sabai user nikalne jasko current user sanga milxa;
// yes ma lai  jas le follow gareko xu tyo data 
// uid  maa mero id jun jun id le  follow gareko xa tyo
// users.uid,users.name,users.username,users.profile,users.bio 

$userId = $_GET['cuid'];
$sql ="SELECT users.uid,users.name,users.username,users.profile,users.bio,users.phoneNo,users.gid,users.gToken,users.status,messageuser.mid,messageuser.lastmessage,messageuser.date   FROM users  JOIN messageuser ON users.uid = messageuser.mcuid  WHERE messageuser.muid='$userId' AND users.status='1' ORDER BY messageuser.date DESC";

$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>