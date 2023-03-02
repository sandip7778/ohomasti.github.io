<?php  
include("apiconfig.php");

// this api user view user than show all information

$uid = $_GET['uid'];

$sql ="SELECT * FROM users WHERE uid='$uid'";
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