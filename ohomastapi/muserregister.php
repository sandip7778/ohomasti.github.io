
<?php  
include("apiconfig.php");

$muid = $_POST['muid'];
$mcuid = $_POST['mcuid'];


$sql ="INSERT INTO messageuser (muid,mcuid) VALUES('$muid','$mcuid')";
if ($conn->query($sql)) {
    $response =array("status"=>"failed");
}
$response =array("status"=>"success");

echo json_encode($response);
?>