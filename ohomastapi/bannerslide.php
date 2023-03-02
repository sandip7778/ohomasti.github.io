<?php  
include("apiconfig.php");
$sql ="SELECT * FROM banner WHERE status='1'";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    $response =array("status"=>"failed","data"=>$row);
}else{
    $response =array("status"=>"success" , "data"=>$row);
}


echo json_encode($response);
?>