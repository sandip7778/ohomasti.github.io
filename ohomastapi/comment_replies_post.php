<?php  
include("apiconfig.php");

$user_id = $_POST['uid'];
$comment_id = $_POST['cmmentid'];
$comment = $_POST['comments'];

$sql ="INSERT INTO comment_reply (user_id,comment_id,comment) VALUES('$user_id','$comment_id','$comment')";

if ($conn->query($sql)) {
    $response =array("status"=>"success");
    $sqlss ="SELECT users.uid,users.username,users.profile,comment_reply.id,comment_reply.comment,comment_reply.created FROM users JOIN comment_reply ON users.uid = comment_reply.user_id WHERE comment_reply.comment='$comment' ORDER BY  comment_reply.id DESC";
    $result = $conn->query($sqlss);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($row)) {
        $response =array("status"=>"failed");
    }else{
        $response =array("status"=>"success" , "data"=>$row);
    }
  
}else {
    $response =array("status"=>"failed");
}


echo json_encode($response);
?>