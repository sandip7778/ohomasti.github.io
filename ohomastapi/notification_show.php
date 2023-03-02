<?php  
include("apiconfig.php");

$userId = $_GET['uid'];

$sql ="SELECT users.uid,users.username,users.profile,notification.id,notification.sender_usserid,notification.receive_userid, notification.notification_type, notification.checked,notification.createrd FROM users JOIN notification ON users.uid = notification.sender_usserid WHERE notification.receive_userid='$userId' ORDER BY  notification.id DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success" , "data"=>$row);
}


echo json_encode($response);
?>