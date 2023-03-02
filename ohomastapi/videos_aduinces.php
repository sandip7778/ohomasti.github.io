
<!-- This api set videos public and private -->

<?php  
include("apiconfig.php");

$video_id = $_POST['videoid'];
$audince = $_POST['audince'];


 $sql ="UPDATE videos SET status='$audince' WHERE vid='$video_id'";
 if ($conn->query($sql)) {
    $response =array("status"=>"success");
  }else{
    $response =array("status"=>"faild");
 }




echo json_encode($response);
?>