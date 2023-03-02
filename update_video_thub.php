<?php

include("configration.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

    $videoUrl= $_FILES['filename']['name'];
    $originalImgName= $_FILES['file']['name'];
    $userID = $_POST['uid'];

    $folder="thumbnal/";
    $thumb_url = "https://www.demonuts.com/Demonuts/JsonTest/Tennis/uploadedFiles/".$originalImgName;

    if(move_uploaded_file($tempName,$folder.$originalImgName)){

        $sql ="UPDATE videos SET thumb='$thumb_url ' WHERE vid='$userID'";
        if ($conn->query($sql)) {
         $response =array("status"=>"success");
        }else {
         $response =array("status"=>"faild");
        }

    }
   
}

?>