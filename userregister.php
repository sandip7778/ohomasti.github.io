<?php  
$servername = "localhost";
$username = "root";
$password ="";
$db ="mastimusic";

$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_errno !=0){
    die("connection failed ".$conn->connect_errno);
}


$name = $_POST['name'];
$username = $_POST['username'];
$bio = $_POST['bio'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNo = $_POST['phoneNo'];
$googleID = $_POST['gid'];
$googleToken = $_POST['gToken'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

// $profile = $_POST['profile'];
$profilename =$name.rand().".jpg";

$profile_url = "https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=2000";
// .$profilename;

$following = 0;
$followers = 0;
$stars = 50;

$status = 1;

$Date = date("Y-m-d"); 

$check = " SELECT * FROM users WHERE username ='$username'";
$checkresult = $conn->query($check);
if ($checkresult->num_rows>0) {
    $response =array("status"=>"failed","data"=>"Sorry this username already taken" );
}else {
    if (file_put_contents("image/".$profilename.base64_decode($profile))) {
        $sql =" INSERT INTO users(name,username,bio,email,password,phoneNo,gid,gToken,profile,following,followers,stars,dob,gender,status,Date) 
            VALUES('$name','$username','$bio','$email','$password','$phoneNo','$googleID','$googleToken','$profile_url'
            ,'$following','$followers','$stars','$dob','$gender','$status','$Date')";
        $result = $conn->query($sql);
        if ($result) {
           $sel = " SELECT * FROM users WHERE username ='$username'";
           $checkresult = $conn->query($check);
          if ($checkresult->num_rows>0) {
            $response =array("status"=>"success" , "data"=>"success");
        
        }else {
            $response =array("status"=>"failed","data"=>"Register Faild");
        }
    }
}
}

echo json_encode($response);
?>