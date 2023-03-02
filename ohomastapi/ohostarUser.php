<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$sql ="SELECT * FROM users ORDER BY followers DESC LIMIT 20";
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