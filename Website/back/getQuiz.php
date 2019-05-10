<?php
$str =  file_get_contents("data.json"); 
$jsonstr = json_decode($str,true);
echo json_encode($jsonstr);
?>