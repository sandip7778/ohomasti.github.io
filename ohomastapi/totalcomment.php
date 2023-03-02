<?php  
include("apiconfig.php");

// yes ma user ko id ra video ko id milnuu para ;

$video_id = $_GET['video_id'];

    $sql ="SELECT COUNT(cid) AS comments FROM comments WHERE vid='$video_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($row)) {
        $response =array("status"=>"failed" );
    }else{
        // $rows = $row['likes'];
        $response =array("status"=>"success" , "data"=>$row);
    
    //   header('location: index.php? error= Email and Password incorrect !');
    }
echo json_encode($response);

?>