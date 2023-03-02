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
    $response =array("status"=>"success" , "data"=>$row);
  
}


echo json_encode($response);
?>