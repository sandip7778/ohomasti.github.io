<?php 
// order number generate depend on date
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
echo $unique = $today . $rand;

?>