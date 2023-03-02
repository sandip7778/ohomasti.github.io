<?php  

    include("apiconfig.php");

    $user_id = $_GET['userid'];
    $sql ="SELECT * FROM users WHERE uid ='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($row)) {
        $response =array("status"=>"failed");
    }else {
        $response =array("status"=>"success" , "data"=>$row);
    }
echo json_encode($response);

?>