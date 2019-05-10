<?
$usersid = $_GET['userid'];
$usergender = $_GET['gen'];
if ($usergender==male)
$oppositegender ='"female"';
else
$oppositegender ='"male"';

$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$newrow=mysql_query("SELECT username,notification FROM askouttable WHERE gender = $oppositegender");
$userarray=array();
while($newresult= mysql_fetch_array($newrow))
{
$botharray=array('noti'=>$newresult['notification'],'users'=>$newresult['username']);
array_push($userarray,$botharray);
}
echo json_encode($userarray);
?>