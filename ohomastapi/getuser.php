<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$username = $_GET['uname'];

$sql ="SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows>0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $response =array("status"=>"success" , "data"=>$row);
}else{
    $response =array("status"=>"failed" );
//   header('location: index.php? error= Email and Password incorrect !');
}
echo json_encode($response);

?>