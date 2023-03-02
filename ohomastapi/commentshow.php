<?php  
include("apiconfig.php");

$vid = $_GET['vid'];

$sql ="SELECT users.uid,users.username,users.profile,comments.cid,comments.message,comments.date FROM users JOIN comments ON users.uid = comments.uid WHERE comments.vid='$vid' ORDER BY  comments.cid DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>