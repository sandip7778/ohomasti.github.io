<?php  
include("apiconfig.php");

$vid = $_GET['vid'];

$sqlvideo = " SELECT * FROM videos WHERE vid = '$vid'";
$result = $conn->query($sqlvideo);
if($result->num_rows>0){
    $row= $result->fetch_assoc();
    $views = $row ['views'];
    $updviews = $views+1;
    $update = "UPDATE videos SET views = '$updviews' WHERE vid = '$vid'";
    $updateresult = $conn->query($update);
    if ($updateresult) {
         
        $response =array("status"=>"success");
    
    }else{
        $response =array("status"=>"update failed" );
    }

}else{
    $response =array("status"=>"failed");
}


echo json_encode($response);
?>