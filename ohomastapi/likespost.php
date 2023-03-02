<?php  
include("apiconfig.php");

$vid = $_POST['vid'];
$uid = $_POST['uid'];
$sqlvideo = " SELECT * FROM videos WHERE vid = '$vid'";
$result = $conn->query($sqlvideo);
if($result->num_rows>0){
    $row= $result->fetch_assoc();
    $likes = $row ['likes'];
    $updlike = $likes+1;
    // $response =array("status"=>"success","data"=>$updlike);
    $update = " UPDATE videos SET likes = '$updlike' WHERE vid = '$vid'";
    $updateresult = $conn->query($update);
    if ($updateresult) {
        $sqllike = " INSERT INTO likes (vid,cid) VALUES('$vid','$uid')";
        if($conn->query($sqllike)) {
            $response =array("status"=>"success");
        }
    }else{
        $response =array("status"=>"update failed" );
    }

}else{
    $response =array("status"=>"failed");
}


echo json_encode($response);
?>