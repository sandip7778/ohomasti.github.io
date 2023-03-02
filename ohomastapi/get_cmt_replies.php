<?php  
include("apiconfig.php");

$comment_id = $_GET['cmtid'];

$sql ="SELECT users.uid,users.username,users.profile,comment_reply.id,comment_reply.comment,comment_reply.created FROM users JOIN comment_reply ON users.uid = comment_reply.user_id WHERE comment_reply.comment_id='$comment_id' ORDER BY  comment_reply.id DESC";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed");
}
$response =array("status"=>"success" , "data"=>$row);

echo json_encode($response);
?>