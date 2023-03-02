
<?php  

$servername = "localhost";
$username = "root";
$password ="";
$db ="mastimusic";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_errno !=0){
    die("connection failed ".$conn->connect_errno);
}
 if($_SERVER['REQUEST_METHOD']=='POST'){
        $originalImgName= $_FILES['file']['name'];
        $tempName= $_FILES['file']['tmp_name'];
        
        $title = $_POST['caption'];
        $tags = $_POST['tags'];
        $userID = $_POST['uid'];
        $description = $_POST['description'];
        $publicPrivate = $_POST['status'];
        $duteAllow = $_POST['dute'];
        $commentAllow = $_POST['comment'];
        $aid = $_POST['aid'];

       
        $folder="uploadFiles/";
    

        $video_url = "https://www.demonuts.com/Demonuts/JsonTest/Tennis/uploadedFiles/".$originalImgName; //update path as per your directory structure 

            if(move_uploaded_file($tempName,$folder.$originalImgName)){
                $queryVideo = "INSERT INTO videos (vtitle,videourl,tags,likes,uid,aid,description,status,publicPrivate,duteAllow,cmmentAllow)
                VALUES ('$title','$video_url','$tags',0,'$userID','$aid','$description',1,'$publicPrivate','$duteAllow','$commentAllow')";
                    if(mysqli_query($conn,$queryVideo)){

                      echo json_encode(array( "status" => "true","message" => "Video Upload Success "));

                    }else {
                        echo json_encode(array( "status" => "false","message" => "Video upload Failed!") );
                    }     
            }else {
                echo json_encode(array( "status" => "false","message" => "Video move Failed!") );
               }
    }
?>