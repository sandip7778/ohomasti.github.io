<?php  
    include("apiconfig.php");

    $user_id = $_POST['userid'];
    $user_name = $_POST['username'];
    
    $sql ="SELECT * FROM users WHERE username ='$user_name'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($row)) {
        $response =array("status"=>"failed");

    }else {
        $sql = "INSERT INTO verify_request (user_id,user_name,status) VALUES('$user_id','$user_name','0')";
       if($conn->query($sql)){
          $response =array("status"=>"success");
       }else{
        $response =array("status"=>"failed");
       }

    }
echo json_encode($response);
?>