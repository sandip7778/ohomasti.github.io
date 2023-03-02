<?php  
include("apiconfig.php");

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$phoneNo = $_POST['phoneNo'];
$googleID = $_POST['gid'];
$googleToken = $_POST['gToken'];

$dob = '0';
$gender = 'm';

$bio = 'Hi I am using OHO App ';
$email = 'not email';
$following = 0;
$followers = 0;
$stars = 50;
$profile = "https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=2000";
$status = 1;

$Date = date('Y-m-d H:i:s');; 

$check = " SELECT * FROM users WHERE username ='$username'";
$checkresult = $conn->query($check);
if ($checkresult->num_rows>0) {
    $response =array("status"=>"failed","data"=>"Sorry this username already taken" );
}else {
        $sql ="INSERT INTO users(name,username,bio,email,password,phoneNo,gid,gToken,profile,following,followers,stars,dob,gender,status,Date) 
            VALUES('$name','$username','$bio','$email','$password','$phoneNo','$googleID','$googleToken','$profile',
            '$following','$followers','$stars','$dob','$gender','$status','$Date')";
        if ($conn->query($sql)) {
            $response =array("status"=>"success","data"=>"successfull");
           
        }else {
            $response =array("status"=>"failed","data"=>"Register Faild");
        }
    }

 

echo json_encode($response);
?>