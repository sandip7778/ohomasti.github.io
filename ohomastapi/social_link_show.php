<?php  
include("apiconfig.php");

$user_id = $_GET['uid'];

$sql ="SELECT * FROM social_links WHERE  user_id='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}else {
    $response =array("status"=>"success" , "data"=>$row);
}
echo json_encode($response);
?>