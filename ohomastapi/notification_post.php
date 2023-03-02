<?php  
include("apiconfig.php");

$sendrId = $_POST['senderid'];
$receiverId = $_POST['receiveid'];
$message_type = $_POST['type'];
$checked = 0;
$t=time();

$date=(date("Y-m-d".$t));

$sql ="INSERT INTO notification (sender_usserid,receive_userid,notification_type,checked) 
        VALUES('$sendrId','$receiverId','$message_type',$checked)";

if ($conn->query($sql)) {
    $response =array("status"=>"success");
}else {
    $response =array("status"=>"failed");
}


echo json_encode($response);
?>