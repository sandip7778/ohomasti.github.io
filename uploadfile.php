
<?php  

include("configration.php");

 if($_SERVER['REQUEST_METHOD']=='POST'){

        $videoUrl= $_FILES['filename']['name'];
        $tempSong= $_FILES['filename']['tmp_name'];

        $originalImgName= $_FILES['file']['name'];
        $tempName= $_FILES['file']['tmp_name'];

        $title = $_POST['caption'];
        $tags = $_POST['tags'];
        $userID = $_POST['uid'];
        $description = $_POST['description'];
        $publicPrivate = $_POST['status'];
        $duteAllow = $_POST['dute'];
        $commentAllow = $_POST['comment'];

        $folder="uploadFiles/";
        $videoName = uniqid() . ".mp3";

        $date = date('Y-m-d H:i:s');

        $video_url = "https://www.demonuts.com/Demonuts/JsonTest/Tennis/uploadedFiles/".$originalImgName; //update path as per your directory structure 
        $audio_url = "https://www.demonuts.com/Demonuts/JsonTest/Tennis/uploadedFiles/".$videoName; 
        if (move_uploaded_file($tempSong, "sound/$videoName")) {
            $queryins = "INSERT INTO audio (audio_title,audio_url,uid) VALUES ('$title','$audio_url','$userID')";
            if(mysqli_query($conn,$queryins)){
                $query= "SELECT * FROM audio WHERE audio_url='$audio_url'";
                $result= mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){ 
                    $row= $result->fetch_assoc();
                    $aid = $row['aid'];
                      if(move_uploaded_file($tempName,$folder.$originalImgName)){
                        $queryVideo = "INSERT INTO videos (vtitle,videourl,video_thum,tags,likes,uid,aid,description,status,publicPrivate,duteAllow,cmmentAllow,date)
                         VALUES ('$title','$video_url','no','$tags',0,'$userID','$aid','$description',1,'$publicPrivate','$duteAllow','$commentAllow','$date')";
                        if(mysqli_query($conn,$queryVideo)){
                          $sql ="SELECT * FROM videos WHERE vid='$userID'";
                          $result = $conn->query($sql);
                          $row = $result->fetch_all(MYSQLI_ASSOC);
                          if (empty($row)) {
                            echo json_encode(array( "status" => "false","message" => "Video upload Failed!") );
                          }else {
                            echo json_encode(array( "status" => "true","message" => $row));
                          }
                          // echo json_encode(array( "status" => "true","message" => "Video Upload Success "));

                        }else {
                          echo json_encode(array( "status" => "false","message" => "Video upload Failed!") );
                        }
                        
                      }else {
                        echo json_encode(array( "status" => "false","message" => "Video move Failed!") );
                     }
                
            }else {
                echo json_encode(array( "status" => "false","message" => "Failed!") );
             
            }
         } 
       }else{
        	echo json_encode(array( "status" => "false","message" => "Failed!") );
        }
       
      }

  ?>