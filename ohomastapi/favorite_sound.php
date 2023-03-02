<?php  
include("apiconfig.php");

$userID = $_POST['userID'];
$audioID = $_POST['audioID'];

$check ="SELECT * FROM favorite_song  WHERE audio_id ='$audioID' AND user_id ='$userID'  ";
$result = $conn->query($check);
$row = $result->fetch_all(MYSQLI_ASSOC);
if (empty($row)) {
    
    $sql ="INSERT INTO favorite_song (user_id,audio_id) VALUES('$userID','$audioID')";
    if ($conn->query($sql)) {
        $response =array("status"=>"success");
    }else {
        $response =array("status"=>"failed");
    }

}else {
    $response =array("status"=>"success");
}




echo json_encode($response);
?>