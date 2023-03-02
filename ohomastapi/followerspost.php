<?php  
include("apiconfig.php");

$cuid = $_POST['cuid'];
$uid = $_POST['uid'];

$sqluser = " SELECT * FROM users WHERE uid = '$uid'";
$result = $conn->query($sqluser);
if($result->num_rows>0){

    $row= $result->fetch_assoc();
    $followers = $row ['followers'];
    $followersupdate = $followers+1;
    // $response =array("status"=>"success","data"=>$updlike);
    $updatefollow = " UPDATE users SET followers = '$followersupdate' WHERE uid = '$uid'";
    $updateresult = $conn->query($updatefollow);
    
    if ($updateresult) {

        $sqlcurruser = " SELECT * FROM users WHERE uid = '$cuid'";
        $cuserresult = $conn->query($sqlcurruser);
        if($cuserresult->num_rows>0){

            $row= $cuserresult->fetch_assoc();
            $following = $row ['following'];
            $followingupd = $following+1;
            $updatefollowing = " UPDATE users SET following = '$followingupd' WHERE uid = '$cuid'";
            $followingresult = $conn->query($updatefollowing);
            if ($updateresult) {

                $sqllike = " INSERT INTO followers (uid,cuid) VALUES('$uid','$cuid')";
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