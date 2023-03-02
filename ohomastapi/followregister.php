<?php  
include("apiconfig.php");

$uid = $_POST['uid'];
$cuid = $_POST['cuid'];


$sql ="INSERT INTO followers (muid,mcuid) VALUES('$uid','$cuid')";
if ($conn->query($sql)) {
    $response =array("status"=>"failed");
}
$response =array("status"=>"success");

echo json_encode($response);
?>