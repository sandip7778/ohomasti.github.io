<?php  
include("apiconfig.php");

$message = $_POST['message'];
// $mcuid = $_POST['mcuid'];

$t=time();

$date=(date("Y-m-d".$t));

$sql ="UPDATE messageuser SET lastmessage='$muid' WHERE mid='1'";
if ($conn->query($sql)) {
    $response =array("status"=>"success");
}else {
    $response =array("status"=>"faild");
}


echo json_encode($response);
?>