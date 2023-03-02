<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$vid = $_GET['vid'];

$sql = "DELETE FROM videos WHERE uid='$vid'";
if ($conn->query($sql)) {
    $response =array("status"=>"success");
}else{
    $response =array("status"=>"failed" );
}
echo json_encode($response);

?>