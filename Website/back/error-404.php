<?php
$url =  $_SERVER['REQUEST_URI'];
$id = explode("?q",$url)[1];
echo $id;
echo "Loading";

?>