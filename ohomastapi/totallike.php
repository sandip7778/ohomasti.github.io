<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$uid = $_GET['uid'];
$check = "SELECT  * FROM videos WHERE uid='$uid'";
$resultchecks = $conn->query($check);
if ($resultchecks->num_rows>0) {

    $sql ="SELECT SUM(likes) AS likes FROM videos WHERE uid='$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($row)) {
        $response =array("status"=>"failed" );
    }else{
        // $rows = $row['likes'];
        $response =array("status"=>"success" , "data"=>$row);
    
    //   header('location: index.php? error= Email and Password incorrect !');
    }
}else {
    $response =array("status"=>"faild" , "data"=>"0");
}

echo json_encode($response);

?>