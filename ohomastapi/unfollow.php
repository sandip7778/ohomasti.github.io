<?php  
include("apiconfig.php");

$cuid = $_POST['cuid'];
$uid = $_POST['uid'];

$sqluser = " SELECT * FROM users WHERE uid = '$uid'";
$result = $conn->query($sqluser);
if($result->num_rows>0){

    $row= $result->fetch_assoc();
    $followers = $row ['followers'];
    if($followers==0){
        $followersupdate =0;
    }else {
        $followersupdate = $followers-1;
    }
    // $response =array("status"=>"success","data"=>$followersupdate);
    $updatefollow = " UPDATE users SET followers = '$followersupdate' WHERE uid = '$uid'";
    $updateresult = $conn->query($updatefollow);
    if ($updateresult) {

        $sqlcurruser = " SELECT * FROM users WHERE uid = '$cuid'";
        $cuserresult = $conn->query($sqlcurruser);
        if($cuserresult->num_rows>0){

            $row= $cuserresult->fetch_assoc();
            $following = $row ['following'];
            if($following==0){
                $followingupd =0;
            }else {
                $followingupd = $following-1;
            }
            $updatefollowing = " UPDATE users SET following = '$followingupd' WHERE uid = '$cuid'";
            $followingresult = $conn->query($updatefollowing);
            if ($updateresult) {

                $sqllike = " DELETE FROM  followers WHERE uid ='$uid'AND cuid='$cuid'";
                if($conn->query($sqllike)) {
                    $response =array("status"=>"success");
                }
            }else{
                $response =array("status"=>"update f failed" );
            }
        }else{
        $response =array("status"=>"update 2 failed" );
    }
       
    }else{
        $response =array("status"=>"update failed" );
    }

}else{
    $response =array("status"=>"failed");
}
echo json_encode($response);
?>