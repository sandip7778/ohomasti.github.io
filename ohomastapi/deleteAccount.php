<?php  
include("apiconfig.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql ="SELECT * FROM users WHERE username ='$username' AND password='$password' ";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data");

}else {
    $sql ="UPDATE users SET status='0' WHERE username ='$username'";
    if ($conn->query($sql)) {
      $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    } 
}


echo json_encode($response);
?>