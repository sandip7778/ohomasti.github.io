<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$username = $_GET['uname'];

$sql ="SELECT * FROM users WHERE username LIKE '%$username%'";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed" );
}else{
    $response =array("status"=>"success" , "data"=>$row);
  
//   header('location: index.php? error= Email and Password incorrect !');
}
echo json_encode($response);

?>