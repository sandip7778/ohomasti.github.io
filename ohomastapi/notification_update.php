<?php  
include("apiconfig.php");

$notification_id = $_POST['notiID'];


$sql ="UPDATE notification SET checked='1' WHERE id='$notification_id'";
if ($conn->query($sql)) {
    $response =array("status"=>"success");
}else {
    $response =array("status"=>"faild");
}


echo json_encode($response);
?>