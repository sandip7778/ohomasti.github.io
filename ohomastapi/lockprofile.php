<?php  
include("apiconfig.php");

// this api post lock profile in user
// 1 = is public ; 2 = profile private;

$user_id = $_POST['userid'];
$lockpos = $_POST['lock'];


if ($lockpos=="0") {
    $sql ="UPDATE users SET status='1' WHERE uid='$user_id'";
    if ($conn->query($sql)) {
        $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    }
}else {
    $sql ="UPDATE users SET status='2' WHERE uid='$user_id'";
    if ($conn->query($sql)) {
        $response =array("status"=>"success");
    }else {
        $response =array("status"=>"faild");
    }
}



echo json_encode($response);
?>