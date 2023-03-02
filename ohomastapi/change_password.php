<?php  
include("apiconfig.php");

$user_id = $_POST['userid'];
$current_password = $_POST['current'];
$password = $_POST['newpass'];

$sql ="SELECT * FROM users WHERE uid ='$user_id' AND password='$current_password' ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data");

}else {
    $sql ="UPDATE users SET password='$password' WHERE uid ='$user_id'";
    if ($conn->query($sql)) {
      $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    } 
}

echo json_encode($response);
?>