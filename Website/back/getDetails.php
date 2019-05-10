<?php
$quizId = $_GET["n"];
$str =  file_get_contents("details.json"); 
$jsonstr = json_decode($str,true);
echo json_encode($jsonstr["data"][$quizId-1]);
?>
