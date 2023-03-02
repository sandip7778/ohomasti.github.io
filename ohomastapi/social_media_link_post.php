<?php  
include("apiconfig.php");

$user_id = $_POST['uid'];
$facebook_id = $_POST['fb_id'];
$insta_id = $_POST['insta_id'];
$youtube_id = $_POST['youtu_id'];
$whatsapp = $_POST['w-id'];

$sql ="SELECT * FROM social_links WHERE  user_id='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    
    $sql =" INSERT INTO social_links(user_id,facebook_id,insta_id,youtube_id,whatsapp) 
       VALUES('$user_id','$facebook_id','$insta_id','$youtube_id','$whatsapp')";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {
        $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    }

}else {

    $sql_update ="UPDATE social_links SET facebook_id='$facebook_id',insta_id='$insta_id',youtube_id='$youtube_id', whatsapp='$whatsapp' WHERE user_id ='$user_id'";
    if ($conn->query($sql_update)) {
      $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    } 
}

echo json_encode($response);
?>