<?
$con = mysql_connect("localhost","abhaysr1","abhay0707");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$selectquery = mysql_query("SELECT * FROM matchsummary");
$matcharrays=array();
while($row=mysql_fetch_array($selectquery))
{
array_push($matcharrays,$row);
}
echo json_encode($matcharrays);

?>