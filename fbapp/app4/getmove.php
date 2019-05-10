<?
$playerid=$_POST['player1'];
if($playerid==12345)
$playerid=12346;
else
$playerid=12345;
$con = mysql_connect("localhost","abhaysr1","abhay0707");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$selectquery = mysql_query("SELECT LASTDICEPOS,LASTACTIVITY,TOTALCOIN,TOTALASSET FROM usergame WHERE userid = $playerid");
$row=mysql_fetch_array($selectquery);
$userdata=array('lastpos'=>$row['LASTDICEPOS'],'lastactivity'=>$row['LASTACTIVITY'],'totalcoin'=>$row['TOTALCOIN'],'totalasset'=>$row['TOTALASSET']);
echo json_encode($userdata);
?>