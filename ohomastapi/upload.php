<?php  
include("apiconfig.php");

$uid = $_POST['uid'];
$vid = $_POST['vid'];
$message = $_POST['message'];
$directory = "ohomastapi/";
$videos =$directory. basename($_FILES['file']['name']);

if (isset($_FILES['file'])) {
    if (move_uploaded_file($_FILES['file']['tmp_name'],$videos)) {
        $sql ="INSERT INTO comments (vid,uid,message) VALUES('$vid','$uid','$message')";
      if ($conn->query($sql)) {
       $response =array("status"=>"failed");
     }
      $response =array("status"=>"success");
    }
}



echo json_encode($response);
?>