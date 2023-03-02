
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

        $profile= $_FILES['filename']['name'];
        $temname= $_FILES['filename']['tmp_name'];

        $uid = $_POST['uid'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $dob = $_POST['dob'];
        $gender = $_POST['genter'];

        $folder="uploadFiles/";
      
        $profile_url = "https://www.demonuts.com/Demonuts/JsonTest/Tennis/uploadedFiles/".$profile; //update path as per your directory structure 
        if(move_uploaded_file($temname,$folder.$profile)){
            $updateQuery = "UPDATE user SET bio='$bio',email='$email',dob='$dob',gender='$gender',profile='$profile_url' WHERE uid='$uid'";
            if(mysqli_query($conn,$updateQuery)){

                echo json_encode(array( "status" => "true","message" => " Profile setup success "));

            }else {
            echo json_encode(array( "status" => "false","message" => "setu Failed!") );
            }
                        
        }else {
            echo json_encode(array( "status" => "false","message" => "profile move Failed!") );
        }
                
 }
 

  ?>