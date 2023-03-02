<?php  
include("apiconfig.php");

$VideoID = $_POST['vid'];
$Video_url = $_POST['vurl'];
$reason = $_POST['reason'];
$UserID = $_POST['uid'];


$sql ="INSERT INTO report (rvid,rvurl,ruid,reason) VALUES('$VideoID','$Video_url','$UserID','$reason')";

if ($conn->query($sql)) {
    $response =array("status"=>"success");
}else {
    $response =array("status"=>"faild");
}


echo json_encode($response);
?>