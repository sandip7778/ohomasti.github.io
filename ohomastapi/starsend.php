<?php  
include("apiconfig.php");

$uid = $_POST['uid'];
$vid = $_POST['vid'];
$cuid = $_POST['cuid'];
$stars = $_POST['stars'];
$reason = $_POST['reason'];

$sql ="INSERT INTO stars (stars,uid,vid,cuid,reason) VALUES('$stars','$uid','$vid','$cuid','$reason')";

if($conn->query($sql)){
   
    $response =array("status"=>"failed");
}
$check_user_star = " SELECT * FROM users WHERE uid = '$cuid'";
$result = $conn->query($check_user_star);
if ($result) {
    $row= $result->fetch_assoc();
    $star = $row ['stars'];
    $updstar= $star-$stars;
    // $response =array("status"=>"success","data"=>$updstar);
    $update = " UPDATE users SET stars = '$updstar' WHERE uid = '$cuid'";
    $updateresult = $conn->query($update);
    if ($updateresult) {
        $check_user = " SELECT * FROM users WHERE uid = '$uid'";
        $getresult = $conn->query($check_user);
        if ($getresult) {
            $rows= $getresult->fetch_assoc();
            $star_data = $rows ['stars'];
            $updstardata= $star_data+$stars;
            $update_datas = " UPDATE users SET stars = '$updstardata' WHERE uid = '$uid'";
            $result_datas = $conn->query($update_datas);
            if ($result_datas) {
                $response =array("status"=>"success"); 
            }else {
                $response =array("status"=>"faild"); 
            }
        }
        
    }else {
        $response =array("status"=>"faild"); 
    }
}


echo json_encode($response);
?>