<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$userId = $_GET['muid'];
$currentUID = $_GET['mcuid'];

$sql ="SELECT * FROM messageuser WHERE muid= '$userId' AND vid='$currentUID'";
$result = $conn->query($sql);
if ($result->num_rows>0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $response =array("status"=>"success");
    
}else{
    $response =array("status"=>"failed" );
//   header('location: index.php? error= Email and Password incorrect !');
}
echo json_encode($response);
?>