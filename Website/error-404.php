<?php
$url =  $_SERVER['REQUEST_URI'];
$id = explode("?q=",$url)[1];
if(empty($id))
{
	header('Location: http://abhaysrivastav.net/Website/#!/');
}
else
{
	header('Location: http://abhaysrivastav.net/Website/#!/quiz/'.$id);	
}
?>