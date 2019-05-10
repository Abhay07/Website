<?
$userid=$_POST['askoutuserid'];
$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$selectquery = mysql_query("SELECT matcheduser FROM askouttable WHERE username = $userid");
$row=mysql_fetch_array($selectquery);
$matcheduserarray=explode(",",$row['matcheduser']);
array_pop($matcheduserarray);

echo json_encode($matcheduserarray);

?>