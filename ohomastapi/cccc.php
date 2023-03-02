<?php  
include("apiconfig.php");

$uid = $_POST['uid'];
$vid = $_POST['vid'];
$message = $_POST['message'];

$sql ="INSERT INTO comments (vid,uid,message) VALUES('$vid','$uid','$message')";

if ($conn->query($sql)) {
    $response =array("status"=>"success");
    $sql ="SELECT users.uid,users.username,users.profile,comments.cid,comments.message,comments.date FROM users JOIN comments ON users.uid = comments.uid WHERE comments.vid='$vid' ORDER BY  comments.cid DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}
$response =array("status"=>"success" , "data"=>$row);
  
}else {
    $response =array("status"=>"failed");
}


echo json_encode($response);
?>
?>